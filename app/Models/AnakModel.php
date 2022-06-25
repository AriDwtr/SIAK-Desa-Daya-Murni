<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakModel extends Model
{
    protected $table            = 'tbl_anak';
    protected $primaryKey       = 'id_anak';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_penduduk','nik_anak','nama_anak','tgl_lahir_anak',
    'tempat_lahir_anak','agama_anak','pekerjaan_anak','jenis_kelamin_anak','tgl_buat'];
}
