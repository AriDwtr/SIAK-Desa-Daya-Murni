<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nip','nik','nama','jk','tempat_lahir','tanggal_lahir','agama','foto','alamat','username','password','role','id_jabatan'];
}
