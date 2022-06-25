<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\UserModel;

class AdminProfileController extends BaseController
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
        $id = $session->get('id_pegawai');
        $pegawai = new UserModel();
        $jabatan = new JabatanModel();
        $builder = $this->db->table('tbl_pegawai as pegawai');
        $builder->select('*');
        $builder->join('tbl_jabatan as jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
        $builder->where('pegawai.id_pegawai', $id);
        $profile = $builder->get()->getResult();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'profile'=>$profile,
            'pegawai'=>$pegawai->find($id),
            'jabatan'=>$jabatan->findAll(),
        ];
        return view('admin/profile/profile', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $pegawai = new UserModel();
        $cek_kades = $pegawai->find($id);
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
            'jabatan'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan Harus diisi',
                ]
            ],
            'alamat'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus diisi',
                ]
            ],
        ];

        if($this->validate($rules)){
            $username = date(date('dmY', strtotime($this->request->getPost('tanggal'))));
            $id_jabatan = $this->request->getPost('jabatan');
            if ($id_jabatan == 2) {
                $id_jabatan = 3 ;
             }else {
                 $id_jabatan = $id_jabatan;
            }
            $jabatan = new JabatanModel();
            $id_role = $jabatan->find($id_jabatan);
            $role = $id_role['status'];
            if ($cek_kades['role']=="kades") {
                $data = [
                    'nik'           => $this->request->getPost('nik'),
                    'nip'           => $this->request->getPost('nip'),
                    'nama'          => $this->request->getPost('nama'),
                    'tempat_lahir'  => $this->request->getPost('tmpt'),
                    'tanggal_lahir' => $this->request->getPost('tanggal'),
                    'jk'            => $this->request->getPost('jk'),
                    'username'      => $username,
                    'agama'         => $this->request->getPost('agama'),
                    'alamat'        => $this->request->getPost('alamat'),
                ];
            }else {
                $data = [
                    'nik'           => $this->request->getPost('nik'),
                    'nip'           => $this->request->getPost('nip'),
                    'nama'          => $this->request->getPost('nama'),
                    'tempat_lahir'  => $this->request->getPost('tmpt'),
                    'tanggal_lahir' => $this->request->getPost('tanggal'),
                    'jk'            => $this->request->getPost('jk'),
                    'id_jabatan'    => $id_jabatan,
                    'role'          => $role,
                    'username'      => $username,
                    'agama'         => $this->request->getPost('agama'),
                    'alamat'        => $this->request->getPost('alamat'),
                ];
            }
           
        $pegawai->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Profile');
        return redirect()->route('admin.profile');
        }else{
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

    public function password($id)
    {
        $session = session();
        helper(['form']);
        $pegawai = new UserModel();
        $rules = [
            'password'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus diisi',
                ]
            ],
            'repassword'          => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Nama Harus diisi',
                    'matches'  => 'Password Tidak Sama Tolong Tulis Ulang'
                ]
            ]
        ];

        if($this->validate($rules)){
            $data = [
                'password'  => password_hash($this->request->getPost('repassword'), PASSWORD_BCRYPT)
            ];
        $pegawai->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Password');
        return redirect()->route('admin.profile');
        }else{
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

    public function photo()
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
        return view('admin/profile/photo', $data);
    }

    public function photoupload($id)
    {
        $session = session();
        $pegawai = new UserModel();
        $rules = [
            'photo'           => [
                'rules' => 'uploaded[photo]',
                'errors' => [
                    'uploaded' => 'Anda Belum Masukan Foto',
                ]
            ],
        ];

        if($this->validate($rules)){
            $file = $this->request->getFile('photo');
            $photoname = $file->getRandomName();
            $data = [
                'foto'=>$photoname,
            ];
        $pegawai->update($id, $data);
        $file->move('../public/photo', $photoname);
        return redirect()->route('admin.logout');
        }else{
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
}
