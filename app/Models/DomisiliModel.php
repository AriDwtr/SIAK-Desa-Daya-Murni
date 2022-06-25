<?php

namespace App\Models;

use CodeIgniter\Model;

class DomisiliModel extends Model
{
    protected $table            = 'tbl_sk_domisili';
    protected $primaryKey       = 'id_domisili';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik','nama','tgl_lahir','tempat_lahir','agama','pekerjaan','jenis_kelamin','alamat','foto_dokumen','tgl_buat'];
}
