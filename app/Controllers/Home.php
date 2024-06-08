<?php

namespace App\Controllers;
use Config\Services;
use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Controllers\Proyectos;

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
            $proyecto = new Proyecto();
            $tarea = new Tarea();
            $dataProyecto = new Proyectos();
            $templates = [
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer'),
            'cantProyecto'=>$proyecto->cantidadDeProyectos(),
            'cantTarea'=>$tarea->cantidadDeTareas(),
            'datosDeProyecto'=>$dataProyecto->proyectosConEstados()
            ];
            return view('vistas/inicio',$templates);
        }else{
            return view('login');
        }
    }

    public function iniciarSession(){
        $usuario = $this->request->getPost('username');
        $contrasenia = $this->request->getPost('password');
        $usuarios = new Usuario();
        $proyecto = new Proyecto();
        $tarea = new Tarea();
        $dataProyecto = new Proyectos();
        $informacionUsuario = $usuarios->buscarNombreDeusuario($usuario,$contrasenia); 
        if($informacionUsuario){
            $informacionDeSession = array('id'=>$informacionUsuario->id_usuario,'usuario'=>$informacionUsuario->username);
            $this->session->set($informacionDeSession);
            $templates = ['header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer'),
            'cantProyecto'=>$proyecto->cantidadDeProyectos(),
            'cantTarea'=>$tarea->cantidadDeTareas(),
            'datosDeProyecto'=>$dataProyecto->proyectosConEstados()
        ];
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
