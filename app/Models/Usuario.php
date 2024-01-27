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
        $tabla = $this->db->table('usuario');
        $confirmacionUsuario = array('username'=>$nombre,'password'=>$password);
        $tabla->where($confirmacionUsuario);
        $resultadoDeBusqueda = $tabla->get();
        return $resultadoDeBusqueda->getRow();
    }


}