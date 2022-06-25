<?php

namespace App\Models;

use CodeIgniter\Model;

class TidakMampuModel extends Model
{
    protected $table            = 'tbl_sk_tidakmampu';
    protected $primaryKey       = 'id_tidakmampu';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik','nama','tgl_lahir','tempat_lahir','agama','pekerjaan','jenis_kelamin','alamat','foto_dokumen','tgl_buat'];
}
