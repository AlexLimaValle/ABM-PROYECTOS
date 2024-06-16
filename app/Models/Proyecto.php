<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use Config\Services;
use App\Models\ProyectoDetalle;

class Proyecto extends Model{
    protected $table = 'proyecto';
    protected $primaryKey = 'id_proyecto';
    protected $db;
    protected $session;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
        $this->session = Services::session();
    }

    public function proyectoId($id){
        $tabla = $this->db->table('proyecto');
        $tabla->select('proyecto.*,estado_proyecto.nombre AS estadoProyecto');
        $tabla->join('estado_proyecto','estado_proyecto.id_estado=proyecto.estado');
        $tabla->where('id_proyecto',$id);
        $resultado = $tabla->get();
        return $resultado->getRow();
    }

    public function todosLosProyectos(){
        $query = "
            SELECT 
                (SELECT IF(t2.id_tarea IS NOT NULL,SUM(IF(t2.id_estado = 3,1,0))/COUNT(t2.id_tarea),0) 
	            FROM tarea t2 
	            WHERE t2.id_proyecto = p.id_proyecto AND t2.borrado_logico = 0) as cantidad,
                p.*
                FROM proyecto p 
                LEFT JOIN tarea t ON p.id_proyecto = t.id_proyecto 
                WHERE p.borrado_logico = 0 
                GROUP BY p.id_proyecto 
        ";
        $datos = $this->db->query($query);
        return $datos->getResult();
    }

    public function buscarPorNombre(string $nombre){
        $tabla = $this->db->table('proyecto');
        $tabla->like('nombre',$nombre);
        $resultados = $tabla->get();
        return $resultados->getRow();
    }

    public function agregarProyectosNuevos($nombreProyecto,$estado,$fechaInicio,$fechaFin,$miembro,$descripcion){
        $table = $this->db->table('proyecto');
        $creador = $this->session->get('id');
        $datos = array(
            'id_proyecto'=>null,
            'nombre'=>$nombreProyecto,
            'fecha_inicio'=>$fechaInicio,
            'fecha_fin'=>$fechaFin,
            'estado'=>$estado,
            'create_by'=>date('Y-m-d h:i:s'),
            'create_to'=>$creador,
            'delete_by'=>null,
            'delete_to'=>null,
            'borrado_logico'=>0,
            'descripcion'=>$descripcion
        );
        $table->insert($datos);
        $buscarProyecto = $this->buscarPorNombre($nombreProyecto);
        $idProyecto = $buscarProyecto->id_proyecto;
        $proyectosDetalle = new ProyectoDetalle();
        $proyectosDetalle->agregarNuevoRegistro($idProyecto,$miembro);
        
    }


    public function eliminarProyect($id){
        $tabla = $this->db->table("proyecto");
        $tabla->set('borrado_logico','1',false);
        $tabla->where("id_proyecto",$id);
        $tabla->update();
    }

    public function cantidadDeProyectos(){
        $tabla = $this->db->table('proyecto');
        $tabla->selectCount('proyecto.id_proyecto');
        $tabla->where('borrado_logico','0');
        $resultado = $tabla->get();
        return $resultado->getRow();
    }

    public function ajaxProyectos(string $valor){
        $tabla = $this->db->table("proyecto");
        $tabla->select("proyecto.id_proyecto AS proyectoId,proyecto.nombre AS nombreProyecto,proyecto.fecha_inicio AS fechaInicio,proyecto.fecha_fin AS fechaFin,estado_proyecto.nombre AS nombreEstado");
        $tabla->join("estado_proyecto","estado_proyecto.id_estado = proyecto.estado");
        $tabla->where("proyecto.borrado_logico","0");
        $tabla->like("proyecto.nombre",$valor,"both");
        $resultado = $tabla->get();
        return $resultado->getResult();
    }
    
    
}