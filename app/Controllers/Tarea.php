<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tarea as TareaModels;

class Tarea extends BaseController
{
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
}
