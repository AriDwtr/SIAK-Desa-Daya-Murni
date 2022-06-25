<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PindahDatangModel;
use App\Models\SuratModel;
use Dompdf\Dompdf;

class PelayananSKPindahDatangController extends BaseController
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $pindahdatang = new PindahDatangModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pindahdatang' => $pindahdatang->orderBy('id_pindahdatang', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-pindahdatang/pindahdatang', $data);
    }

    public function report()
    {
        $session = session();
        $pindahdatang = new PindahDatangModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pindahdatang' => $pindahdatang->orderBy('id_pindahdatang', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-pindahdatang/report_pindahdatang', $data);
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
        return view('pelayanan/sk-pindahdatang/tambah_pindahdatang', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $pindahdatang = new PindahDatangModel();
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
                    'required' => 'Alamat Asal Harus diisi',
                ]
            ],
            'alamat_tujuan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Tujuan Harus diisi',
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
                'alamat_sekarang'   => $this->request->getPost('alamat'),
                'alamat_tujuan'   => $this->request->getPost('alamat_tujuan'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $pindahdatang->insert($data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Membuat Surat');
            return redirect()->route('pelayanan.pindahdatang');
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
        $pindahdatang = new PindahDatangModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pindahdatang' => $pindahdatang->find($id),
        ];
        return view('pelayanan/sk-pindahdatang/edit_pindahdatang', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $pindahdatang = new PindahDatangModel();
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
                    'required' => 'Alamat Asal Harus diisi',
                ]
            ],
            'alamat_tujuan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Tujuan Harus diisi',
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
                'alamat_sekarang'   => $this->request->getPost('alamat'),
                'alamat_tujuan'   => $this->request->getPost('alamat_tujuan'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $pindahdatang->update($id, $data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Memperbaharui Surat');
            return redirect()->route('pelayanan.pindahdatang');
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
        $pindahdatang = new PindahDatangModel();
        $pindahdatang->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Surat');
        return redirect()->back();
    }

    public function cetak($id)
    {
        $id_surat = 1;
        $pindahdatang = new PindahDatangModel();
        $user_pd = $pindahdatang->find($id);
        $surat = new SuratModel();
        $nomor_surat = $surat->find($id_surat);
        $data = [
            'kades' => $this->db->table("tbl_pegawai")->where('role', 'kades')->get()->getResult(),
            'pindahdatang' => $this->db->table("tbl_sk_pindahdatang")->where('id_pindahdatang', $id)->get()->getResult(),
            'sk' => $this->db->table("tbl_surat")->where('id_surat', '1')->get()->getResult(),
        ];

        $update = [
            'pindah_datang' => $nomor_surat['pindah_datang'] + 1,
        ];

        $filename = 'Surat-Pindah-Datang-' . $user_pd['nama'] . '-' . $user_pd['nik'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pelayanan/sk-pindahdatang/cetak_pindahdatang', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        $surat->update($id_surat, $update);
    }
}
