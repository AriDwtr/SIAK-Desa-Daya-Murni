<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class KadesPegawaiController extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect(); // Loading database
        // OR $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $builder = $this->db->table("tbl_pegawai as pegawai");
        $builder->select('*');
        $builder->join('tbl_jabatan as jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
        $pegawai = $builder->get()->getResult();
        $data_pegawai = new UserModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pegawai' => $pegawai,
            'data_admin' => $data_pegawai->where('role','admin')->countAllResults(),
            'data_kades' => $data_pegawai->where('role','kades')->countAllResults(),
            'data_pelayanan' => $data_pegawai->where('role','pelayanan')->countAllResults(),
            'data_laki' => $data_pegawai->where('jk','Laki - Laki')->countAllResults(),
            'data_perempuan' => $data_pegawai->where('jk','Perempuan')->countAllResults(),
        ];
        return view('kades/pegawai/report_pegawai', $data);
    }
}
