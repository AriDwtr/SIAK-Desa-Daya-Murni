<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuModel extends Model
{
    protected $table            = 'tbl_ibu';
    protected $primaryKey       = 'id_ibu';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_penduduk','nik_ibu','nama_ibu','tgl_lahir_ibu','tempat_lahir_ibu',
    'agama_ibu','pekerjaan_ibu','jenis_kelamin_ibu','tgl_buat'];
}
