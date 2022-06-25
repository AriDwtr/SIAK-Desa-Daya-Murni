<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblIbu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ibu'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_penduduk'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'=> true
            ],
            'nik_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_lahir_ibu'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tempat_lahir_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'agama_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'pekerjaan_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_ibu', true);
        $this->forge->createTable('tbl_ibu');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_ibu');
    }
}
