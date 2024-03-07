<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class Estados extends Model{

        protected $db;
        protected $session;

        public function __construct(){
            parent::__construct();
            $this->db = \Config\Database::connect();
            $this->session = \Config\Services::session();
        }

        public function todosLosEstados(){
            $datos = $this->db->table("estado_proyecto");
            $data = $datos->get();
            return $data->getResult();
        }
    }