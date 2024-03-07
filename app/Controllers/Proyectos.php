<?php

    namespace App\Controllers;
    use App\Models\Proyecto;
    use App\Models\Estados;

    class Proyectos extends BaseController{
        
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
    }   