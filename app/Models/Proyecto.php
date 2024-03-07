<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use Config\Services;


class Proyecto extends Model{
    protected $table = 'proyecto';
    protected $primaryKey = 'id_proyecto';
    protected $db;
    protected $session;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
        $this->db = Services::session();
    }

    public function todosLosProyectos(){
        $datosProyectos = $this->table("proyectos");
        $datos = $datosProyectos->get();
        return $datos->getResult();
    }

    
    

}