<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSkKematian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kematian'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_lahir'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'tempat_lahir'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'agama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'pekerjaan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'alamat'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'tanggal_wafat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'alamat_makam'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'foto_dokumen'   => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_kematian', true);
        $this->forge->createTable('tbl_sk_kematian');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_sk_kematian');
    }
}
