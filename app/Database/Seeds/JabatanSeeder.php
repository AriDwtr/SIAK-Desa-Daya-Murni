<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_jabatan'=>'',
                'jabatan'=>'Administrator',
                'status'=>'admin',
            ],
            [
                'id_jabatan'=>'',
                'jabatan'=>'Kepala Desa',
                'status'=>'kades',
            ],
            [
                'id_jabatan'=>'',
                'jabatan'=>'Pelayanan',
                'status'=>'pelayanan',
            ],
        ];

        $this->db->table('tbl_jabatan')->insertBatch($data);
    }
}
