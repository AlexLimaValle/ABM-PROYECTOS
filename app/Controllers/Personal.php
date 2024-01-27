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
            $persona = new Persona();
            $todoElPersonal = $persona->todoPersonal();
            $rol = new Rol();
            $datosPersonal = array();
            foreach($todoElPersonal as $persona){
                $personalDatos = array('id'=>$persona->id_persona,'nombre'=>$persona->nombre,'correo'=>$persona->email);
                $rolPersonal = $rol->personalRol($persona->id_rol);
                $personalDatos['rol'] = $rolPersonal->nombre;
                array_push($datosPersonal,$personalDatos);
            }
            $datosDePersona['roles'] = $rol->todosLosRoles();
            $datosDePersona['personal'] = $datosPersonal;
            return view('vistas/personal',$datosDePersona);
        }

        public function personasConSusRoles($id=''){
            if(empty($id)){
                $instanciaPersona = new Persona();
                $instanciaRol = new Rol();
                $todoElPersonal = $instanciaPersona->todoPersonal();
                $datosPersonal = array();
                foreach($todoElPersonal as $persona){
                    $personalDatos = array('id'=>$persona->id_persona,'nombre'=>$persona->nombre,'correo'=>$persona->email);
                    $rolPersonal = $instanciaRol->personalRol($persona->id_rol);
                    $personalDatos['rol'] = $rolPersonal->nombre;
                    array_push($datosPersonal,$personalDatos);
                }
                return $datosPersonal;
            }
        }

        public function filtroPersonalConRoles(){
            $instanciaPersona = new Persona();
            $instanciaRol = new Rol();
            $filtro = $this->request->getGet('valorBuscar');
            $todoElPersonal = $instanciaPersona->filtrarPersona($filtro);
            $datosPersonal = array();
            foreach($todoElPersonal as $persona){
                $personalDatos = array('id'=>$persona->id_persona,'nombre'=>$persona->nombre,'correo'=>$persona->email);
                $rolPersonal = $instanciaRol->personalRol($persona->id_rol);
                $personalDatos['rol'] = $rolPersonal->nombre;
                array_push($datosPersonal,$personalDatos);
            }
            $datosParseados = $this->parsearDatosHTML($datosPersonal);
            return json_encode($datosParseados);
        }


        public function busqueda(){
            $resultadoBusquedaPersona = $this->personasConSusRoles();
            $datos = $this->parsearDatosHTML($resultadoBusquedaPersona);
            return json_encode($datos);
        }

        public function parsearDatosHTML($data){
            $datos = '';
            foreach($data as $persona){
                $id = $persona['id'];
                $nombre = $persona['nombre'];
                $correo = $persona['correo'];
                $rol = $persona['rol'];
                $datos .= <<<EOD
                    <tr>
                        <td>$id</td>
                        <td>$nombre</td>
                        <td>$correo</td>
                        <td>$rol</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Acciones</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="http://localhost/proyectos/public/eliminar/$id">Eliminar</a></li>
                                    <li><a class="dropdown-item" href="#">Modificar</a></li>
                                    <li><a class="dropdown-item" href="#">Ver</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                EOD;
            }
            return $datos;
        }

    
        public function nuevoPersonal(){
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $email = $this->request->getPost('email');
            $fecha = $this->request->getPost('fecha');
            $rol = $this->request->getPost('rol');
            $informacion = $this->request->getPost('informacion');
            $nuevaPersona = new Persona();
            $nuevaPersona->nuevaPersona($nombre,$apellido,$email,$fecha,$rol,$informacion);
            $arrayDePrueba = $this->personasConSusRoles();
            $datosTotales = $this->parsearDatosHTML($arrayDePrueba);
            return json_encode($datosTotales);
        }

        public function eliminarPersonal($id){
            $persona = new Persona();
            $persona->eliminarPersona($id);
            return redirect()->to('/personal');
        }

        public function updatePersona($id){
            
        }
    }