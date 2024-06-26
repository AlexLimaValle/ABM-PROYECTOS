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
        $tabla->where('id_proyecto',$id);
        $resultado = $tabla->get();
        return $resultado->getRow();
    }

    public function todosLosProyectos(){
        $datosProyectos = $this->table("proyectos");
        $datosProyectos->where('borrado_logico',0);
        $datos = $datosProyectos->get();
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
    
}