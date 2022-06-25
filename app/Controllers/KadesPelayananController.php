<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DomisiliModel;
use App\Models\KelahiranModel;
use App\Models\KematianModel;
use App\Models\PindahDatangModel;
use App\Models\TidakMampuModel;

class KadesPelayananController extends BaseController
{
    public function index()
    {
        $session = session();
        $domisili = new DomisiliModel();
        $kelahiran = new KelahiranModel();
        $kematian = new KematianModel();
        $pindahdatang = new PindahDatangModel();
        $tidakmampu = new TidakMampuModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'domisili' => $domisili->orderBy('id_domisili', 'DESC')->findAll(),
            'kelahiran' => $kelahiran->orderBy('id_kelahiran', 'DESC')->findAll(),
            'kematian' => $kematian->orderBy('id_kematian', 'DESC')->findAll(),
            'pindahdatang' => $pindahdatang->orderBy('id_pindahdatang', 'DESC')->findAll(),
            'tidakmampu' => $tidakmampu->orderBy('id_tidakmampu', 'DESC')->findAll(),
        ];
        return view('kades/pelayanan/report_pelayanan', $data);
    }
}
