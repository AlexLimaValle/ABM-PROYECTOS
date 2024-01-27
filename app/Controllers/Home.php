<?php

namespace App\Controllers;
use Config\Services;
use App\Models\Usuario;

class Home extends BaseController
{

    private $session;

    public function __construct(){
        $this->session = Services::session();
    }

    public function index(): string
    {
        $sessionIniciada = $this->session->get('usuario');
        if($sessionIniciada){
            $templates = ['header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer')];
            return view('vistas/inicio',$templates);
        }else{
            return view('login');
        }
    }

    public function iniciarSession(){
        $usuario = $this->request->getPost('username');
        $contrasenia = $this->request->getPost('password');
        $usuarios = new Usuario();
        $informacionUsuario = $usuarios->buscarNombreDeusuario($usuario,$contrasenia); 
        if($informacionUsuario){
            $informacionDeSession = array('id'=>$informacionUsuario->id_usuario,'usuario'=>$informacionUsuario->username);
            $this->session->set($informacionDeSession);
            $templates = ['header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer')];
            return view('vistas/inicio',$templates);
        }else{
            return view('login');
        }
        
    }


    public function cerrarSession(){
        $this->session->destroy();
        return redirect()->to('/');
    }
}
