<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;


class Tarea extends Model{
    protected $table = 'tarea';
    protected $primaryKey = 'id_tarea';
    private $db;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
    }
}