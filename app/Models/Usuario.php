<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Usuario extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $db;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
    }

    public function buscarNombreDeusuario($nombre,$password){
        if($this->confirmarPassword($nombre,$password)){
            $tabla = $this->db->table('usuario');
            $tabla->where('username',$nombre);
            $resultadoDeBusqueda = $tabla->get();
            return $resultadoDeBusqueda->getRow();
        }else{
            return false;
        }
    }

    public function confirmarPassword($usuario,$password){
        $tabla = $this->db->table('usuario');
        $tabla->select('password');
        $tabla->where('username',$usuario);
        $resultado = $tabla->get()->getRow();
        $desencriptar = password_verify($password,$resultado->password);
        return $desencriptar;
    }

    public function findAllUsers(){
        $tabla = $this->db->table('usuario');
        $tabla->where("borrado_logico","0");
        $resultados = $tabla->get();
        return $resultados->getResult();
    }

    public function insertUser($datos){
        $tabla = $this->db->table('usuario');
        $tabla->insert($datos);
    }

}