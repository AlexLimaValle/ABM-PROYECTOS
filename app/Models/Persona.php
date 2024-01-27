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

    public function todoPersonal(){
        $personal = $this->db->table('personas');
        $resultadoDePersonal = $personal->get();
        return $resultadoDePersonal->getResult();
    }


    public function nuevaPersona($nombre,$apellido,$email,$fecha,$rol,$informacion){
        $datosDePersona = $this->db->table('personas');
        $fechaActual = date('Y-m-d H:i:s');
        $añoAhora = date('Y');
        $fechaObjeto = date_create($fecha);
        $fechaCambioFormato = date_format($fechaObjeto,'Y');
        $edadPersona = (int)$añoAhora - (int) $fechaCambioFormato;
        $idSession = $this->session->get('id');
        $datosDeNuevaPersona = [
            'id_persona'=>null,
            'nombre'=>$nombre,
            'apellidos'=>$apellido,
            'email'=>$email,
            'edad'=>$edadPersona,
            'fecha_nacimiento'=>$fecha,
            'create_by'=>$fechaActual,
            'create_to'=>$idSession,
            'delete_by'=>null,
            'delete_to'=>null,
            'borrado_logico'=>0,
            'informacion'=>$informacion,
            'imagen'=>null,
            'id_rol'=>$rol,
        ];
        $datosDePersona->insert($datosDeNuevaPersona);
    }

    public function eliminarPersona($id){
        $tabla = $this->db->table('personas');
        $tabla->where('id_persona',$id);
        $tabla->delete();
    }

    public function filtrarPersona($palabra=''){
        $tabla = $this->db->table('personas');
        $resultado = $tabla->like('nombre',$palabra,'both');
        $final = $resultado->get();
        return $final->getResult();
    }

    public function updatePersona(array $datos){
        
    }
}