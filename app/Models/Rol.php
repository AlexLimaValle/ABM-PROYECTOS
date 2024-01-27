<?php

namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class Rol extends Model{
    protected $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function personalRol($idPersonal){
        $personalRol = $this->db->table('rol');
        $condicionRol = $personalRol->where('id_rol',$idPersonal)->get();
        return $condicionRol->getRow();

    }

    public function todosLosRoles(){
        $tablaRol = $this->db->table('rol');
        $resultadoDeRoles = $tablaRol->get();
        return $resultadoDeRoles->getResult();
    }
}