<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnakModel;
use App\Models\AyahModel;
use App\Models\IbuModel;
use App\Models\PendudukModel;
use App\Models\SuratModel;

class KadesDashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        $id = 1;
        $surat = new SuratModel();
        $penduduk = new PendudukModel();
        $ayah = new AyahModel();
        $ibu = new IbuModel();
        $anak = new AnakModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk'=> $session->get('jk'),
            'foto'=>$session->get('foto'),
            'role' => $session->get('role'),
            'surat'=>$surat->find($id),
            'penduduk'=>$penduduk->countAllResults(),
            'ayah'=>$ayah->countAllResults(),
            'ibu'=>$ibu->countAllResults(),
            'anak'=>$anak->countAllResults(),
        ];
        return view('kades/dashboard', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('loginsistem');
    }
}
