<?php

namespace App\Models;

use CodeIgniter\Model;

class KematianModel extends Model
{
    protected $table            = 'tbl_sk_kematian';
    protected $primaryKey       = 'id_kematian';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik','nama','tgl_lahir','tempat_lahir','tempat_lahir','agama','pekerjaan','jenis_kelamin','alamat','tanggal_wafat','alamat_makam','foto_dokumen','tgl_buat'];
}
