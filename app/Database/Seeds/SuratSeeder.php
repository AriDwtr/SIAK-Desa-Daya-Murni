<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_surat'=>'',
                'domisili'=>'0',
                'tidak_mampu'=>'0',
                'pindah_datang'=>'0',
                'kematian'=>'0',
                'kelahiran'=>'0',
                'penduduk'=>'0',
            ],
        ];

        $this->db->table('tbl_surat')->insertBatch($data);
    }
}
