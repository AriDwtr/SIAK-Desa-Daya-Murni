<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPenduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penduduk'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_kk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'rtrw'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'kelurahan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'=> true
            ],
            'kecamatan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'=> true
            ],
            'tgl_buat'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_penduduk', true);
        $this->forge->createTable('tbl_penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_penduduk');
    }
}
