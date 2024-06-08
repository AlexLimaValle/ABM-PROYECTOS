<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tarea as TareaModels;
use App\Models\EstadoTarea;

class Tarea extends BaseController
{
    private $session;

    public function __construct(){
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $tareaModelos = new TareaModels();
        $data = [
            'data'=>$tareaModelos->mostrarTareas(),
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer')
        ];

        return view('vistas/tareas_view',$data);
    }

    public function borrarTarea($id){
        $tareas = new TareaModels();
        $tareas->borradoTarea($id);
        return redirect()->to(base_url('tarea'));
    }

    public function buscarTarea(){
        $tarea = $this->request->getGet('tarea');
        $tareas = new TareaModels();
        $resultadoTareas = $tareas->mostrarTareasParticular($tarea);
        return json_encode($resultadoTareas);
    }

    public function actualizarItemTarea(int $id){
        $tarea = new TareaModels();
        $estados = new EstadoTarea();
        $estadosDeTarea = $estados->todosLosEstados();
        $listaDeTarea = $tarea->actulizacionDeTarea($id);
        $todasLasTareas = $tarea->mostrarTareas();
        $cargarComponentes = [
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer'),
            'datosTarea'=>$listaDeTarea,
            'todoEstados'=>$estadosDeTarea,
            'tareas'=>$todasLasTareas,
            'idTarea'=>$id
        ];
        return view('vistas/tarea_actualizar_view',$cargarComponentes);
    }

    public function guardarActualizacion(int $id){
        $nombreActualizar = $this->request->getGet('tareaActualizarNombre');
        $estadoActualizar = $this->request->getGet('estadosTarea');
        $descripcionActualizar = $this->request->getGet('descripcion');
        $tarea = new TareaModels();
        $tarea->guardarActualizacionTarea($id,$nombreActualizar,$estadoActualizar,$descripcionActualizar);
        return redirect()->to(base_url('tarea'));
    }
}
