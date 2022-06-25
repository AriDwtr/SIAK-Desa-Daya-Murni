<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table            = 'tbl_penduduk';
    protected $primaryKey       = 'id_penduduk';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['no_kk','alamat','rtrw','kelurahan','kecamatan','tgl_buat'];
}
