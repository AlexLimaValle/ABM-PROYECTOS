<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AgregarColumnaOrdenes extends Migration
{
    public function up()
    {
        $campos = [
            'precio'=>[
                'type'=>'DECIMAL',
                'constraint'=>'10,2',
                'after'=>'nombre',
                'null'=>false
            ]
        ];

        $this->forge->addColumn('ordenes',$campos);
    }

    public function down()
    {
        //
    }
}
