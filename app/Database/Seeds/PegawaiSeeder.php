<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip'=>'1234567',
                'nik'=>'070797',
                'nama'=>'ari dwiantoro',
                'jk'=>'Laki-Laki',
                'username'=>'07071997',
                'password'=> password_hash('12345', PASSWORD_BCRYPT),
                'role'=>'admin',
                'id_jabatan'=>'1'
            ],
            [
                'nip'=>'4523273283',
                'nik'=>'263263823',
                'nama'=>'bima purwantoro',
                'jk'=>'Laki-Laki',
                'username'=>'12345',
                'password'=> password_hash('12345', PASSWORD_BCRYPT),
                'role'=>'kades',
                'id_jabatan'=>'2'
            ],
            [
                'nip'=>'1234567',
                'nik'=>'070798',
                'nama'=>'rizki ratih purwasih',
                'jk'=>'Perempuan',
                'username'=>'22011999',
                'password'=> password_hash('12345', PASSWORD_BCRYPT),
                'role'=>'pelayanan',
                'id_jabatan'=>'3'
            ], 
        ];

        $this->db->table('tbl_pegawai')->insertBatch($data);
    }
}
