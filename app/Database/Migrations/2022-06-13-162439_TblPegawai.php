<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pegawai'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
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
            'jk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'=> true
            ],
            'tempat_lahir'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tanggal_lahir'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'id_jabatan'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'null'=> true
            ],
            'agama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'=> true
            ],
            'foto' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
                'null'=> true
            ],
            'role'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('tbl_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pegawai');
    }
}
