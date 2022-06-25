<?php

namespace App\Models;

use CodeIgniter\Model;

class AyahModel extends Model
{
    protected $table            = 'tbl_ayah';
    protected $primaryKey       = 'id_ayah';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_penduduk','nik_ayah','nama_ayah','tgl_lahir_ayah','tempat_lahir_ayah','agama_ayah',
    'pekerjaan_ayah','jenis_kelamin_ayah','tgl_buat'];
}
