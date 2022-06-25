<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratModel;

class PelayananDashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $surat = new SuratModel();
        $id = 1;
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk'=> $session->get('jk'),
            'foto'=>$session->get('foto'),
            'role' => $session->get('role'),
            'surat'=>$surat->find($id),
        ];
        return view('pelayanan/dashboard', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('loginsistem');
    }
}
