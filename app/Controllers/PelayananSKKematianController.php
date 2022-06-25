<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KematianModel;
use App\Models\SuratModel;

use Dompdf\Dompdf;

class PelayananSKKematianController extends BaseController
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $kematian = new KematianModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kematian' => $kematian->orderBy('id_kematian', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-kematian/kematian', $data);
    }

    public function report()
    {
        $session = session();
        $kematian = new KematianModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kematian' => $kematian->orderBy('id_kematian', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-kematian/report_kematian', $data);
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
        return view('pelayanan/sk-kematian/tambah_kematian', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $kematian = new KematianModel();
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
            'tanggal_wafat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Wafat Harus diisi',
                ]
            ],
            'pemakaman'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pemakaman Harus diisi',
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
                'tanggal_wafat' => $this->request->getPost('tanggal_wafat'),
                'alamat_makam' => $this->request->getPost('pemakaman'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $kematian->insert($data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Membuat Surat');
            return redirect()->route('pelayanan.kematian');
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
        $kematian = new KematianModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kematian' => $kematian->find($id),
        ];
        return view('pelayanan/sk-kematian/edit_kematian', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $kematian = new KematianModel();
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
            'tanggal_wafat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Wafat Harus diisi',
                ]
            ],
            'pemakaman'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pemakaman Harus diisi',
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
                'tanggal_wafat' => $this->request->getPost('tanggal_wafat'),
                'alamat_makam' => $this->request->getPost('pemakaman'),
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $kematian->update($id, $data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Memperbaharui Surat');
            return redirect()->route('pelayanan.kematian');
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
        $kematian = new KematianModel();
        $kematian->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Surat');
        return redirect()->back();
    }

    public function cetak($id)
    {
        $id_surat = 1;
        $kematian = new KematianModel();
        $user_kem = $kematian->find($id);
        $surat = new SuratModel();
        $nomor_surat = $surat->find($id_surat);
        $data = [
            'kades' => $this->db->table("tbl_pegawai")->where('role', 'kades')->get()->getResult(),
            'kematian' => $this->db->table("tbl_sk_kematian")->where('id_kematian', $id)->get()->getResult(),
            'sk' => $this->db->table("tbl_surat")->where('id_surat', '1')->get()->getResult(),
        ];

        $update = [
            'kematian' => $nomor_surat['kematian'] + 1,
        ];

        $filename = 'Surat-Ket-Kematian-' . $user_kem['nama'] . '-' . $user_kem['nik'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pelayanan/sk-kematian/cetak_kematian', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        $surat->update($id_surat, $update);
    }
}
