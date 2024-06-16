<?php

namespace App\Controllers;
use Config\Services;
use App\Models\Usuario as UsuarioModel;
use \CodeIgniter\View\Table;
use App\Models\Persona;

class Usuario extends BaseController{

    private $session;

    private $tabla;

    public function __construct(){
        $this->tabla = new Table();
        $this->session = Services::session();
    }

    public function index():string{
        helper('form');
        $table = $this->tabla;
        $usuarios = new UsuarioModel();
        $personas = new Persona();
        $datoPersonas = $personas->findAllPersona();
        $datos = $usuarios->findAllUsers();
        $data = [
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer'),
            'tabla'=>$table,
            'datos'=>$datos,
            'persona'=>$datoPersonas
        ];
        return view('vistas/usuario_view',$data);
    }

    public function validarUser(){
        $usuarios = new UsuarioModel();
        $usuario = $this->session->get('id');
        $usename = $this->request->getPost('usuario');
        $password1 = $this->request->getPost('password1');
        $password2 = $this->request->getPost('password2');
        $personas = $this->request->getPost('personas');
        $hashear = password_hash($password1,PASSWORD_BCRYPT);
        $datos = [
            'id_usuario'=>null,
            'username'=>$usename,
            'password'=>$hashear,
            'create_by'=>date('Y-m-d H:i:s'),
            'create_to'=>$usuario,
            'delete_by'=>null,
            'delete_to'=>null,
            'borrado_logico'=>0,
            'id_persona'=>$personas
        ];
        $usuarios->insertUser($datos);
        return "usuario: ".$usename." creado";
    }

}