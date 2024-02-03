<?php

    namespace App\Controllers;
    use App\Models\Persona;
    use App\Models\Rol;
    

    class Personal extends BaseController{

        private $session;

        public function __construct(){
            $this->session = \Config\Services::session();
        }

        public function index(){
            $personas = new Persona();
            $datos = $personas->personalConRoles();
            $templates = ['header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer'),'datos'=>$datos];
            return view('vistas/personal',$templates);
        }

       public function agregarPersonal(){
            $roles = new Rol();
            $rol = $roles->todosLosRoles();
            $templates = array('header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer'),'roles'=>$rol);
            return view('vistas/nueva_persona_view',$templates);
       }

       public function guardarPersonal(){
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $fecha = $this->request->getPost('fecha');
            $email = $this->request->getPost('email');
            $rol = $this->request->getPost('rol');
            $observacion = $this->request->getPost('observaciones');
            $persona = new Persona();
            $persona->nuevaPersona($nombre,$apellido,$fecha,$email,$rol,$observacion);
       }

       public function eliminarPersonal(){
            $id_personal = $this->request->getGet('id');
            $persona = new Persona();
            $persona->deletePersonal($id_personal);
            return redirect()->to(base_url('/personal'));
       }


       public function actualizarPersonal($id){
            $persona = new Persona();
            $rol = new Rol();
            $persomaActualizar = $persona->personaConRoles($id);
            $datosActualizar = array('header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer'),'persona'=>$persomaActualizar,'roles'=>$rol->todosLosRoles());
            return view('vistas/update_persona_view.php',$datosActualizar);
       }
    }