<?php

namespace App\Controllers;
use Config\Services;
use App\Models\Usuario as UsuarioModel;


class Usuario extends BaseController{

    private $session;

    public function __construct(){
        $this->session = Services::session();
    }

    public function index():string{
        $data = [
            'header'=>view('vistas/templates/header'),
            'footer'=>view('vistas/templates/footer')
        ];
        return view('vistas/usuario_view',$data);
    }

}