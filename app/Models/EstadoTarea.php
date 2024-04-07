<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoTarea extends Model
{
    protected $table            = 'estado_tarea';
    protected $primaryKey       = 'id_estado';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected $db;
    protected $session; 

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct(){
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function todosLosEstados(){
        $tabla = $this->db->table("estado_tarea");
        $resultados = $this->get();
        return $resultados->getResult();
    }

    public function mostrarEstadoDelaTarea(array $estados){
        $mostraTodosLosEstados = $this->todosLosEstados();
        foreach($estados as $key=>$estado){
            $datos[$key+1]= [
                'id_tarea'=>$estado->id_tarea,
                 'nombre'=>$estado->nombre,
                 'descripcion'=>$estado->descripcion,
                 'nombreEstado'=>''
            ]; 
            foreach($mostraTodosLosEstados as $items){
                if($estado->id_estado == $items->id_estado){
                    $datos[$key+1]['nombreEstado'] = $items->nombre;
                }
            }
        }
        return $datos;
    }
}
