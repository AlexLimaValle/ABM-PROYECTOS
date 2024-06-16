<?php

namespace App\Controllers\API;
use App\Models\Persona;
use CodeIgniter\RESTful\ResourceController;

class Personas extends ResourceController{

    public function __construct(){
        $this->model = $this->setModel(new Persona());
    }
    
    public function index(){
        $personas = $this->model->findAllPersona();
        return $this->respond($personas);
    }

    

}