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
        return view('vistas/usuario');
    }

}