<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSkKelahiran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelahiran'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nik_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_lahir_ayah'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tgl_lahir_ibu'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tempat_lahir_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tempat_lahir_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tempat_lahir_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_anak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_lahir_anak'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tempat_lahir_anak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'agama_anak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'lokasi_lahir'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'foto_dokumen'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_kelahiran', true);
        $this->forge->createTable('tbl_sk_kelahiran');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_sk_kelahiran');
    }
}
