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
            $templates = ['header'=>view('vistas/templates/header'),'footer'=>view('vistas/templates/footer')];
            return view('vistas/personal',$templates);
        }

       
    }