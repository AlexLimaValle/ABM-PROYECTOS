<?php

namespace App\Controllers;
use Config\Services;
use App\Models\Usuario as UsuarioModel;
use \CodeIgniter\View\Table;

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
        $datos = $usuarios->findAllUsers();
        $data = [
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer'),
            'tabla'=>$table,
            'datos'=>$datos
        ];
        return view('vistas/usuario_view',$data);
    }

}