<?php

namespace App\Models;

use CodeIgniter\Model;

class KelahiranModel extends Model
{
    protected $table            = 'tbl_sk_kelahiran';
    protected $primaryKey       = 'id_kelahiran';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nik_ayah','nik_ibu','nama_ayah','nama_ibu','tgl_lahir_ayah','tgl_lahir_ibu',
    'tempat_lahir_ayah','tempat_lahir_ibu','nama_anak','tgl_lahir_anak','tempat_lahir_anak','agama_anak',
    'jenis_kelamin','lokasi_lahir','foto_dokumen','tgl_buat'];
}
