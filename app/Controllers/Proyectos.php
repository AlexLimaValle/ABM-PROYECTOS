<?php

    namespace App\Controllers;
    use App\Models\Proyecto;
    use App\Models\Estados;
    use App\Models\Persona;
    use App\Models\ProyectoDetalle;
    use App\Models\EstadoTarea;
    use App\Models\Tarea;
    use Config\Services;
    class Proyectos extends BaseController{

        /**
         * @return mixed 
         * 
         */
        
        private $session;

        public function __construct(){
            $this->session = Services::session();
        }
        
        public function index(){
            $data = new Proyecto();
            $templates = ["header"=>view("vistas/templates/header"),"footer"=>view("vistas/templates/footer"),'datos'=>$this->proyectosConEstados()];
            return view("vistas/proyectos",$templates);
        }

        public function proyectosConEstados(){
            $proyectos = new Proyecto();
            $estados = new Estados();
            $proyectosData = $proyectos->todosLosProyectos();
            $estadoData = $estados->todosLosEstados();
            $datosDefinitivos = [];
            foreach($proyectosData as $items){
                $datos = [
                    "id_proyecto"=>$items->id_proyecto,
                    "nombre"=>$items->nombre,
                    "fecha_fin"=>$items->fecha_fin,
                    "fecha_inicio"=>$items->fecha_inicio,
                ];
                foreach($estadoData as $estados){
                    if($items->estado == $estados->id_estado){
                        $estado = $estados->nombre;
                        switch ($estados->id_estado) {
                            case 1:
                                $datos["color"] = "secondary";
                                break;
                            case 2:
                                $datos["color"] = "success";
                                break;
                            case 3:
                                $datos["color"] = "danger";
                                break;
                            default:
                                $datos["color"] = "dark";
                                break;
                        }
                        $datos["estado"] = $estado;
                    }
                }
                array_push($datosDefinitivos,(object)$datos);
            }
            return $datosDefinitivos;
        }

        public function agregarNuevoProyecto(){
            $estados = new Estados();
            $personas = new Persona();
            $todosLosEstados = $estados->todosLosEstados();
            $todasLasPersonas = $personas->todasLasPersonas();
            $datos = ['header'=>view("vistas/templates/header"),
            'footer'=>view("vistas/templates/footer"),
            'estados'=>$todosLosEstados,
            'personas'=>$todasLasPersonas,
            'errores'=>[]
            ];
            return view('vistas/nuevo_proyecto_view',$datos);
        }

        public function guardarProyecto(){
            $rules = [
                "nombreProyecto"=>[
                    "label"=>"nombreProyecto",
                    "rules"=>'required|max_length[30]|min_length[5]',
                    "errors"=>[
                        'required'=>'El nombre del proyecto es obligatorio',
                        'max_length'=>'el nombre del proyecto es largo',
                        'min_length'=>'el nombre del proyecto es corto'
                    ]
                ],
                "estado"=>'required',
                "fecha_inicio"=>'required',
                "fecha_fin"=>'required',
                "miembro"=>'required',
            ];
            if($this->validate($rules)){
                $nombreProyecto = $this->request->getPost("nombreProyecto");
                $estado = $this->request->getPost("estado");
                $fechaInicio = $this->request->getPost("fecha_inicio");
                $fechaFin = $this->request->getPost("fecha_fin");
                $miembro = $this->request->getPost("miembro");
                $descipcion = $this->request->getPost("descripcion");
                $proyectos = new Proyecto();
                $proyectos->agregarProyectosNuevos($nombreProyecto,$estado,$fechaInicio,$fechaFin,$miembro,$descipcion);
                return redirect()->to(base_url('/proyectos'));
            }else{
                $validate = \Config\Services::validation();
                $errores = $validate->getErrors();
                $estados = new Estados();
                $personas = new Persona();
                $todosLosEstados = $estados->todosLosEstados();
                $todasLasPersonas = $personas->todasLasPersonas();
                $datos = ['header'=>view("vistas/templates/header"),
                'footer'=>view("vistas/templates/footer"),
                'estados'=>$todosLosEstados,
                'personas'=>$todasLasPersonas,
                'errores'=>$errores
                ];
                return view('vistas/nuevo_proyecto_view',$datos);
            }
            
        }

        public function visualizarProyecto($id){
            helper('form');
            $miembros = new ProyectoDetalle();
            $estadoDeTarea = new EstadoTarea(); 
            $gente = $miembros->miembrosDeProyecto($id);
            $nombresYApellidos = $this->extraerMiembros($gente);
            $proyectos = new Proyecto();
            $datosProyecto = $proyectos->proyectoId($id);
            $estadosDeTareas = $estadoDeTarea->todosLosEstados();
            $tarea = new Tarea();
            $todasLasTareas = $tarea->buscarTareaPorID($id);
            $datos = array(
                "header"=>view('vistas\templates\header'),
                "footer"=>view('vistas\templates\footer'),
                "proyecto"=>$datosProyecto,
                "personal"=>$nombresYApellidos,
                'estadoDeTarea'=>$estadosDeTareas,
                'tareas'=>$todasLasTareas
            );
            return view('vistas/vista_proyecto_view',$datos);
        }

        public function extraerMiembros(array $miembros){
            $registroDePersona = [];
            $personas = new Persona();
            foreach($miembros as $miembro){
                $datosPersonales = $personas->nombrePersonaPorID($miembro->id_persona);
                $datosPersona = array(
                    'nombre'=>$datosPersonales->nombre,
                    'apellidos'=>$datosPersonales->apellidos,
                    'imagen'=>$datosPersonales->imagen
                );
                array_push($registroDePersona,$datosPersona);
            }
            return $registroDePersona;
        }

        public function eliminarProyecto($id){
            $proyectos = new Proyecto();
            $proyectos->eliminarProyect($id);
            return redirect()->to("/proyectos");
        }

        public function agregarTarea($id){
            $nombreDeTarea = $this->request->getGet('tarea');
            $descripcion = $this->request->getGet('descripcion');
            $idEstadoTarea = $this->request->getGet('estadoDeTarea');
            $fechaCreado = date_create();
            $creadoPor = $this->session->get('id');
            $nuevaTarea = [
                'id_tarea'=>null,
                'nombre'=>$nombreDeTarea,
                'descripcion'=>$descripcion,
                'create_by'=>date_format($fechaCreado,'Y-m-d h:i:s'),
                'create_to'=>$creadoPor,
                'delete_by'=>null,
                'delete_to'=>null,
                'borrado_logico'=>0,
                'id_proyecto'=>$id,
                'id_estado'=>$idEstadoTarea
            ];
            $tarea = new Tarea();
            $tarea->agregarTarea($nuevaTarea);
            return redirect()->to(base_url('/verProyecto/'.$id));
        }
    }   