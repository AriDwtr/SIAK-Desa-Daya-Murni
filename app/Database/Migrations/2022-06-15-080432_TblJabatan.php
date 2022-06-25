<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblJabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jabatan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('tbl_jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_jabatan');
    }
}
