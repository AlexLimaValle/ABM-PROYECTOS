<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use App\Models\EstadoTarea;

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
        $tabla->where('id_proyecto',$idProyecto);
        $resultados = $tabla->get()->getResult();
        $estadoDeTarea = new EstadoTarea();
        $arregloDefinitivo = ($resultados)?$estadoDeTarea->mostrarEstadoDelaTarea($resultados):[];
        return $arregloDefinitivo;
    }

}