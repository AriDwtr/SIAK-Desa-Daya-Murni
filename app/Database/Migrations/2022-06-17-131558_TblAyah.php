<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAyah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ayah'          => [
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
            'nik_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_lahir_ayah'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tempat_lahir_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'agama_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'pekerjaan_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_ayah', true);
        $this->forge->createTable('tbl_ayah');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_ayah');
    }
}
