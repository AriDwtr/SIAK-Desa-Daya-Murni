<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\UserModel;

class AdminPegawaiController extends BaseController
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
        $builder = $this->db->table("tbl_pegawai as pegawai");
        $builder->select('*');
        $builder->join('tbl_jabatan as jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
        $pegawai = $builder->get()->getResult();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pegawai' => $pegawai
        ];
        return view('admin/pegawai/pegawai', $data);
    }

    public function report()
    {
        $session = session();
        $builder = $this->db->table("tbl_pegawai as pegawai");
        $builder->select('*');
        $builder->join('tbl_jabatan as jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
        $pegawai = $builder->get()->getResult();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pegawai' => $pegawai,
        ];
        return view('admin/pegawai/report_pegawai', $data);
    }

    public function create()
    {
        $session = session();
        $jabatan = new JabatanModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'jabatan'=>$jabatan->findAll(),
        ];

        return view('admin/pegawai/tambah_pegawai', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $pegawai = new UserModel();
        $rules = [
            'nik'           => [
                'rules' => 'required|is_unique[tbl_pegawai.nik]',
                'errors' => [
                    'required' => 'NIK Harus diisi',
                    'is_unique' => 'NIK Telah Terdaftar'
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
            'password'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus diisi',
                ]
            ],
        ];

        if ($this->validate($rules)) {
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
            $data = [
                'nik'           => $this->request->getPost('nik'),
                'nip'           => $this->request->getPost('nip'),
                'nama'          => $this->request->getPost('nama'),
                'tempat_lahir'  => $this->request->getPost('tmpt'),
                'tanggal_lahir' => $this->request->getPost('tanggal'),
                'jk'            => $this->request->getPost('jk'),
                'id_jabatan'    => $id_jabatan,
                'username'      => $username,
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role'          => $role,
            ];
            $pegawai->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Pegawai Baru');
            return redirect()->route('admin.pegawai');
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
        $pegawai = new UserModel();
        $jabatan = new JabatanModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'pegawai' => $pegawai->find($id),
            'jabatan'=>$jabatan->findAll(),
        ];
        return view('admin/pegawai/edit_pegawai', $data);
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
                    'username'      => $username,
                    'role'          => $role,
                ];
            }
        $pegawai->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Memperbaharui Account Pegawai');
        return redirect()->route('admin.pegawai');
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

    public function delete($id)
    {
        $session = session();
        $pegawai = new UserModel();
        $pegawai->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Pegawai');
        return redirect()->back();
    }
}
