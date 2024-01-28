<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class Rol extends Model{
    protected $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function todosLosRoles(){
        $tablaRoles = $this->db->table('rol');
        $resultadosRoles = $tablaRoles->get();
        return $resultadosRoles->getResult();
    }


    public function rolesPorID($id){
        $tablaRoles = $this->db->table('rol');
        $tablaRoles->where('id_rol',$id);
        $resultadosRoles = $tablaRoles->get();
        return $resultadosRoles->getRow();
    }
}