<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSurat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_surat'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'domisili'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
            'tidak_mampu'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
            'pindah_datang'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
            'kematian'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
            'kelahiran'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
            'penduduk'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_surat', true);
        $this->forge->createTable('tbl_surat');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_surat');
    }
}
