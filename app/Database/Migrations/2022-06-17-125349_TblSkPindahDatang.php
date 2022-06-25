<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSkPindahDatang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pindahdatang'          => [
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
            'alamat_sekarang'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'alamat_tujuan'       => [
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
        $this->forge->addKey('id_pindahdatang', true);
        $this->forge->createTable('tbl_sk_pindahdatang');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_sk_pindahdatang');
    }
}
