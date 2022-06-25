<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DomisiliModel;
use App\Models\SuratModel;
use Dompdf\Dompdf;

class PelayananSKDomisiliController extends BaseController
{

    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $domisili = new DomisiliModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'domisili' => $domisili->orderBy('id_domisili', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-domisili/domisili', $data);
    }

    public function report()
    {
        $session = session();
        $domisili = new DomisiliModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'domisili' => $domisili->orderBy('id_domisili', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-domisili/report_domisili', $data);
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
        return view('pelayanan/sk-domisili/tambah_domisili', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $domisili = new DomisiliModel();
        $rules = [
            'nik'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Harus diisi',
                ]
            ],
            'nama'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                ]
            ],
            'tmpt'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Harus diisi',
                ]
            ],
            'tanggal'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus diisi',
                ]
            ],
            'pekerjaan'          => [
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
            'photo'           => [
                'rules' => 'uploaded[photo]',
                'errors' => [
                    'uploaded' => 'Anda Belum Masukan Foto KTP',
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $file = $this->request->getFile('photo');
            $tanggal_buat = date("Y-m-d");
            $photoname = $file->getRandomName();
            $data = [
                'nik'           => $this->request->getPost('nik'),
                'nama'          => $this->request->getPost('nama'),
                'tempat_lahir'  => $this->request->getPost('tmpt'),
                'tgl_lahir'     => $this->request->getPost('tanggal'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'pekerjaan'     => $this->request->getPost('pekerjaan'),
                'agama'         => $this->request->getPost('agama'),
                'alamat'        => $this->request->getPost('alamat'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $domisili->insert($data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Membuat Surat');
            return redirect()->route('pelayanan.domisili');
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
        $domisili = new DomisiliModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'domisili' => $domisili->find($id),
        ];
        return view('pelayanan/sk-domisili/edit_domisili', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $domisili = new DomisiliModel();
        $rules = [
            'nik'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Harus diisi',
                ]
            ],
            'nama'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                ]
            ],
            'tmpt'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Harus diisi',
                ]
            ],
            'tanggal'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus diisi',
                ]
            ],
            'pekerjaan'          => [
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
            'photo'           => [
                'rules' => 'uploaded[photo]',
                'errors' => [
                    'uploaded' => 'Anda Belum Masukan Foto KTP',
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $file = $this->request->getFile('photo');
            $tanggal_buat = date("Y-m-d");
            $photoname = $file->getRandomName();
            $data = [
                'nik'           => $this->request->getPost('nik'),
                'nama'          => $this->request->getPost('nama'),
                'tempat_lahir'  => $this->request->getPost('tmpt'),
                'tgl_lahir'     => $this->request->getPost('tanggal'),
                'jenis_kelamin' => $this->request->getPost('jk'),
                'agama'         => $this->request->getPost('agama'),
                'pekerjaan'     => $this->request->getPost('pekerjaan'),
                'agama'         => $this->request->getPost('agama'),
                'alamat'        => $this->request->getPost('alamat'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $domisili->update($id, $data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Memperbaharui Surat');
            return redirect()->route('pelayanan.domisili');
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
        $domisili = new DomisiliModel();
        $domisili->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Surat');
        return redirect()->back();
    }

    public function cetak($id)
    {
        $id_surat = 1;
        $domisili = new DomisiliModel();
        $user_dom = $domisili->find($id);
        $surat = new SuratModel();
        $nomor_surat = $surat->find($id_surat);
        $data = [
            'kades' => $this->db->table("tbl_pegawai")->where('role', 'kades')->get()->getResult(),
            'domisili' => $this->db->table("tbl_sk_domisili")->where('id_domisili', $id)->get()->getResult(),
            'sk' => $this->db->table("tbl_surat")->where('id_surat', '1')->get()->getResult(),
        ];

        $update = [
            'domisili' => $nomor_surat['domisili'] + 1,
        ];

        $filename = 'Surat-Domisili-' . $user_dom['nama'] . '-' . $user_dom['nik'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pelayanan/sk-domisili/cetak_domisili', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        $surat->update($id_surat, $update);
    }
}
