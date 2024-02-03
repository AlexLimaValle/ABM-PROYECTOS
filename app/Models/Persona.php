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
            $datosPersonas['borrado_logico'] = $persona->borrado_logico;
            array_push($datosFinales,$datosPersonas);
        }
        return $datosFinales;
    }

    public function personaEspecifica(int $id){
        $tabla = $this->db->table('personas');
        $tabla->where('id_persona',$id);
        $resultado = $tabla->get();
        return $resultado->getRowArray();
    }

// este mehtodo sirve para devolver una persona especifica con sus roles 
    public function personaConRoles(int $id){ 
        $persona = $this->personaEspecifica($id);
        $roles = new Rol();
        $personaRol = $roles->rolesPorID($persona['id_rol']);
        $persona['rol'] = $personaRol->nombre;
        return $persona;
    }

    public function nuevaPersona($nombre,$apellido,$fecha,$email,$rol,$observacion){
        $hoy = date('Y-m-d',time());
        $cumpleanios = date_create($fecha);
        $fechaDeHoy = date_create($hoy);
        $diferencia = date_diff($fechaDeHoy,$cumpleanios);
        $insertar = array(
            'id_persona'=>null,
            'nombre'=>$nombre,
            'apellidos'=>$apellido,
            'email'=>$email,
            'edad'=>$diferencia->format('%y'),
            'fecha_nacimiento'=> $fecha,
            'create_by'=> date('Y-m-d H:i:s'),
            'create_to'=>$this->session->get('id'),
            'delete_by'=>null,
            'delete_to'=>null,
            'borrado_logico'=>0,
            'informacion'=>$observacion,
            'imagen'=>null,
            'id_rol'=>$rol
        );
        $tablaPersona = $this->db->table('personas');
        $tablaPersona->insert($insertar);
    }

    public function deletePersonal($id){
        $tabla = $this->db->table('personas');
        $datos = [
            'borrado_logico'=>1
        ];
        $tabla->where('id_persona',$id);
        $tabla->update($datos);
    }

    public function actualizarDatosDePersonal($id,$nombre,$apellido,$fecha,$email,$rol,$observacion){
        $hoy = date_create();
        $cumpleanios = date_create($fecha);
        $edades = date_diff($hoy,$cumpleanios);
        $edad = $edades->format('%y');
        $tabl = $this->db->table('personas');
        $miFecha = date_format($cumpleanios,'Y-m-d');
        $updates = [
            'nombre'=>$nombre,
            'apellidos'=>$apellido,
            'email'=>$email,
            'edad'=> $edad,
            'fecha_nacimiento'=>$miFecha,
            'update_by'=>date_format($hoy,'Y-m-d H:i:s'),
            'update_to'=>$this->session->get('id'),
            'informacion'=>$observacion,
            'id_rol'=>$rol
        ];
        $tabla = $this->db->table('personas');
        $tabla->where('id_persona',$id);
        $tabla->update($updates);
    }


}