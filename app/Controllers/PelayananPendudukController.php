<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use Dompdf\Dompdf;


class PelayananPendudukController extends BaseController
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $penduduk = new PendudukModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'penduduk' => $penduduk->orderBy('id_penduduk', 'DESC')->findAll(),
        ];
        return view('pelayanan/penduduk/penduduk', $data);
    }
    
    public function create()
    {
        $session = session();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
        ];
        return view('pelayanan/penduduk/tambah_penduduk', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $penduduk = new PendudukModel();
        $rules = [
            'kk'           => [
                'rules' => 'required|is_unique[tbl_penduduk.no_kk]',
                'errors' => [
                    'required' => 'Nomor KK Harus diisi',
                    'is_unique' => 'Nomor KK Telah Terdaftar'
                ]
            ],
            'rt'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT Harus diisi',
                ]
            ],
            'rw'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RW Harus diisi',
                ]
            ],
            'kelurahan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus diisi',
                ]
            ],
            'kecamatan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Harus diisi',
                ]
            ],
            'alamat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi',
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $rtrw = $this->request->getPost('rt').'/'.$this->request->getPost('rw');
            $tanggal_buat = date("Y-m-d");
            $data = [
                'no_kk'           => $this->request->getPost('kk'),
                'rtrw'          => $rtrw,
                'kelurahan'  => $this->request->getPost('kelurahan'),
                'kecamatan'     => $this->request->getPost('kecamatan'),
                'alamat'        => $this->request->getPost('alamat'),
                'tgl_buat'      => $tanggal_buat
            ];
            $penduduk->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Data Penduduk');
            return redirect()->route('pelayanan.penduduk');
        } else {
            $data = [
                'id_pegawai' => $session->get('id_pegawai'),
                'nip' => $session->get('nip'),
                'nama' => $session->get('nama'),
                'jk' => $session->get('jk'),
                'foto' => $session->get('foto'),
                'role' => $session->get('role'),
                'validation' => $this->validator,
            ];
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $session = session();
        $penduduk = new PendudukModel();
        $data_rtwr = $penduduk->find($id);
        $rtrw = explode("/", $data_rtwr['rtrw']);
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'penduduk' => $penduduk->find($id),
            'rt'=>$rtrw[0],
            'rw'=>$rtrw[1],
        ];
        return view('pelayanan/penduduk/edit_penduduk', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $penduduk = new PendudukModel();
        $rules = [
            'kk'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor KK Harus diisi',
                ]
            ],
            'rt'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT Harus diisi',
                ]
            ],
            'rw'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RW Harus diisi',
                ]
            ],
            'kelurahan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus diisi',
                ]
            ],
            'kecamatan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan Harus diisi',
                ]
            ],
            'alamat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi',
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $rtrw = $this->request->getPost('rt').'/'.$this->request->getPost('rw');
            $tanggal_buat = date("Y-m-d");
            $data = [
                'no_kk'           => $this->request->getPost('kk'),
                'rtrw'          => $rtrw,
                'kelurahan'  => $this->request->getPost('kelurahan'),
                'kecamatan'     => $this->request->getPost('kecamatan'),
                'alamat'        => $this->request->getPost('alamat'),
                'tgl_buat'      => $tanggal_buat
            ];
            $penduduk->update($id, $data);
            $session->setFlashdata('msg', 'Berhasil Memperbaharui Data Penduduk');
            return redirect()->route('pelayanan.penduduk');
        } else {
            $data = [
                'id_pegawai' => $session->get('id_pegawai'),
                'nip' => $session->get('nip'),
                'nama' => $session->get('nama'),
                'jk' => $session->get('jk'),
                'foto' => $session->get('foto'),
                'role' => $session->get('role'),
                'validation' => $this->validator,
            ];
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $session = session();
        $penduduk = new PendudukModel();
        $penduduk->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Data Penduduk');
        return redirect()->back();
    }

    public function cetak($id)
    {
        $id_surat = 1;
        $penduduk = new PendudukModel();
        $no_kk = $penduduk->find($id);
        $data = [
            'kades' => $this->db->table("tbl_pegawai")->where('role', 'kades')->get()->getResult(),
            'penduduk' => $this->db->table("tbl_penduduk")->where('id_penduduk', $id)->get()->getResult(),
            'ayah' => $this->db->table("tbl_ayah")->where('id_penduduk', $id)->get()->getResult(),
            'ibu' => $this->db->table("tbl_ibu")->where('id_penduduk', $id)->get()->getResult(),
            'anak' => $this->db->table("tbl_anak")->where('id_penduduk', $id)->get()->getResult(),
        ];

        $filename = 'Surat-Penduduk-' . $no_kk['no_kk'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pelayanan/penduduk/cetak_penduduk', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
