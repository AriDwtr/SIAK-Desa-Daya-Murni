<?php

namespace App\Models;

use CodeIgniter\Model;

class PindahDatangModel extends Model
{
    protected $table            = 'tbl_sk_pindahdatang';
    protected $primaryKey       = 'id_pindahdatang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik','nama','tgl_lahir','tempat_lahir','agama','pekerjaan','jenis_kelamin','alamat_sekarang','alamat_tujuan','foto_dokumen','tgl_buat'];
}
