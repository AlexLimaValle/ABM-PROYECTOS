<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use App\Models\EstadoTarea;
use App\Models\Proyecto;

class Tarea extends Model{
    protected $table = 'tarea';
    protected $primaryKey = 'id_tarea';
    protected $db;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
    }

    public function agregarTarea($tarea){
        $tabla = $this->db->table('tarea');
        $tabla->insert($tarea);
    }

    public function buscarTareaPorID($idProyecto){
        $tabla = $this->db->table('tarea');
        $condicion = [
            'id_proyecto'=>$idProyecto,
            'borrado_logico'=>'0'
        ];
        $tabla->where($condicion);
        $resultados = $tabla->get()->getResult();
        $estadoDeTarea = new EstadoTarea();
        $arregloDefinitivo = ($resultados)?$estadoDeTarea->mostrarEstadoDelaTarea($resultados):[];
        return $arregloDefinitivo;
    }


    public function mostrarTareas():array{
        $tabla = $this->db->table('tarea');
        $tabla->select('tarea.id_tarea AS idTarea,proyecto.nombre AS nombreProyecto,tarea.nombre AS tareaNombre,proyecto.fecha_inicio,proyecto.fecha_fin,estado_proyecto.nombre AS estadoProyecto,estado_tarea.nombre AS estadoTarea');
        $tabla->join('proyecto','proyecto.id_proyecto=tarea.id_proyecto');
        $tabla->join('estado_proyecto','estado_proyecto.id_estado = proyecto.estado');
        $tabla->join('estado_tarea','estado_tarea.id_estado=tarea.id_estado');
        $tabla->where('tarea.borrado_logico !=','1');    
        $tabla->orderBy('proyecto.nombre','ASC');
        $resultado = $tabla->get();
        return $resultado->getResult();
    }

    public function mostrarTareasParticular($nombre):array{
        $tabla = $this->db->table('tarea');
        $tabla->select('tarea.id_tarea AS idTarea,proyecto.nombre AS nombreProyecto,tarea.nombre AS tareaNombre,proyecto.fecha_inicio,proyecto.fecha_fin,estado_proyecto.nombre AS estadoProyecto,estado_tarea.nombre AS estadoTarea');
        $tabla->join('proyecto','proyecto.id_proyecto=tarea.id_proyecto');
        $tabla->join('estado_proyecto','estado_proyecto.id_estado = proyecto.estado');
        $tabla->join('estado_tarea','estado_tarea.id_estado=tarea.id_estado');
        $tabla->where('tarea.borrado_logico !=','1'); 
        $tabla->like('tarea.nombre',$nombre);   
        $tabla->orderBy('proyecto.nombre','ASC');
        $resultado = $tabla->get();
        return $resultado->getResult();
    }

    public function borradoTarea($id){
        $tabla = $this->db->table('tarea');
        $tabla->set('borrado_logico','1');
        $tabla->where('id_tarea',$id);
        $tabla->update();
    }

    public function cantidadDeTareas(){
        $tabla = $this->db->table("tarea");
        $tabla->selectCount('tarea.id_tarea');
        $tabla->where('borrado_logico','0');
        $resultado = $tabla->get();
        return $resultado->getRow();
    }

}