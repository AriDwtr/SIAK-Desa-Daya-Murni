<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table            = 'tbl_surat';
    protected $primaryKey       = 'id_surat';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['domisili','tidak_mampu','pindah_datang','kematian','kelahiran','penduduk'];
}
