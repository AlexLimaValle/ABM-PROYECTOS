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
            $imagen = $this->request->getFile('imagen');
            if($imagen->isValid() && !$imagen->hasMoved()){
                 $contenidoDeImagen = file_get_contents($imagen->getTempName());
                 $convesion = base64_encode($contenidoDeImagen);
            }else{
               $convesion = IMAGEN;
            }
            $observacion = $this->request->getPost('observaciones');
            $persona = new Persona();
            $persona->nuevaPersona($nombre,$apellido,$fecha,$email,$rol,$observacion,$convesion);
            return redirect()->to(base_url('/personal'));
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
            $personaActualizar = $persona->personaConRoles($id);
            $datosActualizar = array('header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer'),'persona'=>$personaActualizar,'roles'=>$rol->todosLosRoles());
            return view('vistas/update_persona_view.php',$datosActualizar);
       }

       public function actualizacionDePersonal(){
            $id = $this->request->getPost('id');
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $fecha = $this->request->getPost('fecha');
            $email = $this->request->getPost('email');
            $rol = $this->request->getPost('rol');
            $imagen = $this->request->getFile('imagen');
            $imagenSubir = null;
            if($imagen->isValid() && !$imagen->hasMoved()){
               $contenido = file_get_contents($imagen->getTempName());
               $base64 = base64_encode($contenido);
               $imagenSubir = $base64;
            }else{
               $imagenSubir = $imagen;
            }
            $observacion = $this->request->getGet('observaciones');
            $personaModel = new Persona();
            $personaModel->actualizarDatosDePersonal($id,$nombre,$apellido,$fecha,$email,$rol,$observacion,$imagenSubir);
       }


       public function buscarPorNombre(){
          $buscador = $this->request->getGet("buscador");
          $persona = new Persona();
          $datosEncontrados = $persona->personaPorNombre($buscador);
          $transformarDatos = $this->parserDatos($datosEncontrados);
          return json_encode($transformarDatos);
       }

       public function parserDatos(array $datos){
          $templateHtml = '';
          foreach($datos as $key=>$data){
               $numero = $key + 1;
               $templateHtml .= <<<EOD
                    <tr>
                         <td>$numero</td>
                         <td>
                              <img src="data:image/*;base64,$data->imagen" style="width:60px;height:60px;" alt="Imagen" class="rounded"/>
                         </td>
                         <td>$data->nombre</td>
                         <td>$data->email</td>
                         <td>$data->id_rol</td>
                         <td>
                              <a
                              name=""
                              id=""
                              class="btn btn-primary"
                              href="#"
                              role="button"
                              >Ver</a
                              >
                              <a
                                  name=""
                                  id=""
                                  class="btn btn-success"
                                  href="http://localhost/proyectos/public/actulizarPersonal/$data->id_persona"
                                  role="button"
                                  >Actualizar</a
                              >
                              <a
                                  name=""
                                  id=""
                                  class="btn btn-danger"
                                  href="http://localhost/proyectos/public/eliminarPersonal?id=$data->id_persona"
                                  role="button"
                                  >Eliminar</a
                              >
                         </td>
                    </tr>
               EOD;
          }
          return $templateHtml;
       }

       public function personalResultado(){
          $idPersonal = $this->request->getGet("buscador");
          $persona = new Persona();
          $resultadosPersonal = $persona->personaEspecifica($idPersonal);
          return json_encode($resultadosPersonal);
       }
    }