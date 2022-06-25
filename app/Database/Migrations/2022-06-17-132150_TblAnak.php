<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAnak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anak'          => [
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
            'nik_anak'       => [
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
            'pekerjaan_anak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin_anak'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_anak', true);
        $this->forge->createTable('tbl_anak');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_anak');
    }
}
