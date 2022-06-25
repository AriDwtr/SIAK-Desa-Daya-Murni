<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelahiranModel;
use App\Models\SuratModel;
use Dompdf\Dompdf;

class PelayananSKKelahiranController extends BaseController
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $session = session();
        $kelahiran = new KelahiranModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kelahiran' => $kelahiran->orderBy('id_kelahiran', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-kelahiran/kelahiran', $data);
    }

    public function report()
    {
        $session = session();
        $kelahiran = new KelahiranModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kelahiran' => $kelahiran->orderBy('id_kelahiran', 'DESC')->findAll(),
        ];
        return view('pelayanan/sk-kelahiran/report_kelahiran', $data);
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
        return view('pelayanan/sk-kelahiran/tambah_kelahiran', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $kelahiran = new KelahiranModel();
        $rules = [
            'nik_ayah'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Ayah Harus diisi',
                ]
            ],
            'nama_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ayah Harus diisi',
                ]
            ],
            'tmpt_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Ayah Harus diisi',
                ]
            ],
            'tanggal_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Ayah Harus diisi',
                ]
            ],
            'nik_ibu'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Ibu Harus diisi',
                ]
            ],
            'nama_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Harus diisi',
                ]
            ],
            'tmpt_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Ibu Harus diisi',
                ]
            ],
            'tanggal_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Ibu Harus diisi',
                ]
            ],
            'nama_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Anak Harus diisi',
                ]
            ],
            'tmpt_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Anak Harus diisi',
                ]
            ],
            'tanggal_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Anak Harus diisi',
                ]
            ],
            'alamat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lahir Harus diisi',
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
                'nik_ayah'           => $this->request->getPost('nik_ayah'),
                'nama_ayah'          => $this->request->getPost('nama_ayah'),
                'tempat_lahir_ayah'  => $this->request->getPost('tmpt_ayah'),
                'tgl_lahir_ayah'     => $this->request->getPost('tanggal_ayah'),

                'nik_ibu'           => $this->request->getPost('nik_ibu'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'tempat_lahir_ibu'  => $this->request->getPost('tmpt_ibu'),
                'tgl_lahir_ibu'     => $this->request->getPost('tanggal_ibu'),

                'nama_anak'          => $this->request->getPost('nama_anak'),
                'tempat_lahir_anak'  => $this->request->getPost('tmpt_anak'),
                'tgl_lahir_anak'     => $this->request->getPost('tanggal_anak'),
                'agama_anak'         => $this->request->getPost('agama'),
                'jenis_kelamin'      => $this->request->getPost('jk'),
                'lokasi_lahir'       => $this->request->getPost('alamat'),
                
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $kelahiran->insert($data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Membuat Surat');
            return redirect()->route('pelayanan.kelahiran');
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
        $kelahiran = new KelahiranModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'kelahiran' => $kelahiran->find($id),
        ];
        return view('pelayanan/sk-kelahiran/edit_kelahiran', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $kelahiran = new KelahiranModel();
        $rules = [
            'nik_ayah'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Ayah Harus diisi',
                ]
            ],
            'nama_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ayah Harus diisi',
                ]
            ],
            'tmpt_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Ayah Harus diisi',
                ]
            ],
            'tanggal_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Ayah Harus diisi',
                ]
            ],
            'nik_ibu'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Ibu Harus diisi',
                ]
            ],
            'nama_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ibu Harus diisi',
                ]
            ],
            'tmpt_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Ibu Harus diisi',
                ]
            ],
            'tanggal_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Ibu Harus diisi',
                ]
            ],
            'nama_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Anak Harus diisi',
                ]
            ],
            'tmpt_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Anak Harus diisi',
                ]
            ],
            'tanggal_anak'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Anak Harus diisi',
                ]
            ],
            'alamat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Lahir Harus diisi',
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
                'nik_ayah'           => $this->request->getPost('nik_ayah'),
                'nama_ayah'          => $this->request->getPost('nama_ayah'),
                'tempat_lahir_ayah'  => $this->request->getPost('tmpt_ayah'),
                'tgl_lahir_ayah'     => $this->request->getPost('tanggal_ayah'),

                'nik_ibu'           => $this->request->getPost('nik_ibu'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'tempat_lahir_ibu'  => $this->request->getPost('tmpt_ibu'),
                'tgl_lahir_ibu'     => $this->request->getPost('tanggal_ibu'),

                'nama_anak'          => $this->request->getPost('nama_anak'),
                'tempat_lahir_anak'  => $this->request->getPost('tmpt_anak'),
                'tgl_lahir_anak'     => $this->request->getPost('tanggal_anak'),
                'agama_anak'         => $this->request->getPost('agama'),
                'jenis_kelamin'      => $this->request->getPost('jk'),
                'lokasi_lahir'       => $this->request->getPost('alamat'),
                
                'foto_dokumen'  => $photoname,
                'tgl_buat'      => $tanggal_buat
            ];
            $kelahiran->update($id, $data);
            $file->move('../public/berkas', $photoname);
            $session->setFlashdata('msg', 'Berhasil Memperbaharui Surat');
            return redirect()->route('pelayanan.kelahiran');
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
        $kelahiran = new KelahiranModel();
        $kelahiran->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Surat');
        return redirect()->back();
    }

    public function cetak($id)
    {
        $id_surat = 1;
        $kelahiran = new KelahiranModel();
        $user_kh = $kelahiran->find($id);
        $surat = new SuratModel();
        $nomor_surat = $surat->find($id_surat);
        $data = [
            'kades' => $this->db->table("tbl_pegawai")->where('role', 'kades')->get()->getResult(),
            'kelahiran' => $this->db->table("tbl_sk_kelahiran")->where('id_kelahiran', $id)->get()->getResult(),
            'sk' => $this->db->table("tbl_surat")->where('id_surat', '1')->get()->getResult(),
        ];

        $update = [
            'kelahiran' => $nomor_surat['kelahiran'] + 1,
        ];

        $filename = 'Surat-Ket-Kelahiran-' . $user_kh['nama_anak'];

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pelayanan/sk-kelahiran/cetak_kelahiran', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        $surat->update($id_surat, $update);
    }
}
