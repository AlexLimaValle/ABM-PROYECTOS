<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use App\Models\Rol;

class Persona extends Model{
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    protected $db;
    protected $session;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
        $this->session = \Config\Services::session();
    }

    public function todasLasPersonas(){
        $personas = $this->db->table('personas');
        $resultado = $personas->get();
        return $resultado->getResult();
    }

    public function personalConRoles(){
        $roles = new Rol();
        $personas = $this->todasLasPersonas();
        $datosFinales = [];
        foreach($personas as $persona){
            $datosPersonas['id'] = $persona->id_persona;
            $datosPersonas['nombre'] = $persona->nombre.' '.$persona->apellidos;
            $datosPersonas['correo'] = $persona->email;
            $datosPersonas['rol'] = $roles->rolesPorID($persona->id_rol)->nombre;
            array_push($datosFinales,$datosPersonas);
        }
        return $datosFinales;
    }

}