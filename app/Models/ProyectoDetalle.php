<?php
    namespace App\Models;
    use CodeIgniter\Model;
    use Config\Database;
    use Config\Services;

    class ProyectoDetalle extends Model{
        
        protected $table = 'proyecto_detalle';
        protected $primaryKey = 'id_detalle';
        protected $db;
        protected $session;

        public function __construct(){
            parent::__construct();
            $this->db = Database::connect();
            $this->session = Services::session();
        }

        public function agregarNuevoRegistro($idProyecto,$miembro){
            $table = $this->db->table('proyecto_detalle');
            foreach($miembro as $persona){
                $datos = array(
                    'id_detalle'=>null,
                    'id_persona'=>$persona,
                    'id_proyecto'=>$idProyecto
                );
                $table->insert($datos);
            }
        }

        public function miembrosDeProyecto($id){
            $tablas = $this->db->table("proyecto_detalle");
            $tablas->where("id_proyecto",$id);
            $resultado = $tablas->get();
            return $resultado->getResult();
        }

    }