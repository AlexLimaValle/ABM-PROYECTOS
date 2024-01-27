<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;


class Proyecto extends Model{
    protected $table = 'proyecto';
    protected $primaryKey = 'id_proyecto';
    private $db;

    public function __construct(){
        parent::__construct();
        $this->db = Database::connect();
    }
}