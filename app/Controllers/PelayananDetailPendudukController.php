<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnakModel;
use App\Models\AyahModel;
use App\Models\IbuModel;

class PelayananDetailPendudukController extends BaseController
{
    public function index($id)
    {
        $session = session();
        $ayah = new AyahModel();
        $ibu = new IbuModel();
        $anak = new AnakModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'ayah' => $ayah->where('id_penduduk', $id)->first(),
            'ibu' => $ibu->where('id_penduduk', $id)->findAll(),
            'anak' => $anak->where('id_penduduk', $id)->findAll(),
            'id'=>$id
        ];
        return view('pelayanan/penduduk/detail_penduduk', $data);
    }

    public function tambah_ayah($id)
    {
        $session = session();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'id'=>$id
        ];
        return view('pelayanan/penduduk/detail_ayah_penduduk', $data);
    }

    public function store_ayah()
    {
        $session = session();
        helper(['form']);
        $ayah = new AyahModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_ayah'           => $this->request->getPost('nik'),
                'nama_ayah'          => $this->request->getPost('nama'),
                'tempat_lahir_ayah'  => $this->request->getPost('tmpt'),
                'tgl_lahir_ayah'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_ayah' => $this->request->getPost('jk'),
                'agama_ayah'         => $this->request->getPost('agama'),
                'pekerjaan_ayah'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $ayah->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Data Suami');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function edit_ayah($id)
    {
        $session = session();
        $ayah = new AyahModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'ayah' => $ayah->find($id),
        ];
        return view('pelayanan/penduduk/detail_ayah_edit_penduduk', $data);
    }

    public function update_ayah($id)
    {
        $session = session();
        helper(['form']);
        $ayah = new AyahModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_ayah'           => $this->request->getPost('nik'),
                'nama_ayah'          => $this->request->getPost('nama'),
                'tempat_lahir_ayah'  => $this->request->getPost('tmpt'),
                'tgl_lahir_ayah'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_ayah' => $this->request->getPost('jk'),
                'agama_ayah'         => $this->request->getPost('agama'),
                'pekerjaan_ayah'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $ayah->update($id, $data);
            $session->setFlashdata('msg', 'Berhasil Mempebaharui Data Suami');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function delete_ayah($id)
    {
        $session = session();
        $ayah = new AyahModel();
        $ayah->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Data Suami');
        return redirect()->back();
    }
    //------------------------
    public function tambah_ibu($id)
    {
        $session = session();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'id'=>$id
        ];
        return view('pelayanan/penduduk/detail_ibu_penduduk', $data);
    }

    public function store_ibu()
    {
        $session = session();
        helper(['form']);
        $ibu = new IbuModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_ibu'           => $this->request->getPost('nik'),
                'nama_ibu'          => $this->request->getPost('nama'),
                'tempat_lahir_ibu'  => $this->request->getPost('tmpt'),
                'tgl_lahir_ibu'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_ibu' => $this->request->getPost('jk'),
                'agama_ibu'         => $this->request->getPost('agama'),
                'pekerjaan_ibu'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $ibu->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Data Istri');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function edit_ibu($id)
    {
        $session = session();
        $ibu = new IbuModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'ibu' => $ibu->find($id),
        ];
        return view('pelayanan/penduduk/detail_ibu_edit_penduduk', $data);
    }

    public function update_ibu($id)
    {
        $session = session();
        helper(['form']);
        $ibu = new IbuModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_ibu'           => $this->request->getPost('nik'),
                'nama_ibu'          => $this->request->getPost('nama'),
                'tempat_lahir_ibu'  => $this->request->getPost('tmpt'),
                'tgl_lahir_ibu'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_ibu' => $this->request->getPost('jk'),
                'agama_ibu'         => $this->request->getPost('agama'),
                'pekerjaan_ibu'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $ibu->update($id, $data);
            $session->setFlashdata('msg', 'Berhasil Mempebaharui Data Istri');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function delete_ibu($id)
    {
        $session = session();
        $ibu = new IbuModel();
        $ibu->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Data Istri');
        return redirect()->back();
    }

    //-----------

    public function tambah_anak($id)
    {
        $session = session();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'id'=>$id
        ];
        return view('pelayanan/penduduk/detail_anak_penduduk', $data);
    }

    public function store_anak()
    {
        $session = session();
        helper(['form']);
        $anak = new AnakModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_anak'           => $this->request->getPost('nik'),
                'nama_anak'          => $this->request->getPost('nama'),
                'tempat_lahir_anak'  => $this->request->getPost('tmpt'),
                'tgl_lahir_anak'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_anak' => $this->request->getPost('jk'),
                'agama_anak'         => $this->request->getPost('agama'),
                'pekerjaan_anak'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $anak->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Data Anak');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function edit_anak($id)
    {
        $session = session();
        $anak = new AnakModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'anak' => $anak->find($id),
        ];
        return view('pelayanan/penduduk/detail_anak_edit_penduduk', $data);
    }

    public function update_anak($id)
    {
        $session = session();
        helper(['form']);
        $anak = new AnakModel();
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
        ];
        if ($this->validate($rules)) {
            $tanggal_buat = date("Y-m-d");
            $id_penduduk = $this->request->getPost('id_penduduk');
            $data = [
                'id_penduduk'        => $id_penduduk,
                'nik_anak'           => $this->request->getPost('nik'),
                'nama_anak'          => $this->request->getPost('nama'),
                'tempat_lahir_anak'  => $this->request->getPost('tmpt'),
                'tgl_lahir_anak'     => $this->request->getPost('tanggal'),
                'jenis_kelamin_anak' => $this->request->getPost('jk'),
                'agama_anak'         => $this->request->getPost('agama'),
                'pekerjaan_anak'     => $this->request->getPost('pekerjaan'),
                'tgl_buat'           => $tanggal_buat
            ];
            $anak->update($id, $data);
            $session->setFlashdata('msg', 'Berhasil Mempebaharui Data Anak');
            return redirect()->to(site_url("pelayanan/penduduk/detail/".$id_penduduk));
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

    public function delete_anak($id)
    {
        $session = session();
        $anak = new AnakModel();
        $anak->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Data Anak');
        return redirect()->back();
    }

}
