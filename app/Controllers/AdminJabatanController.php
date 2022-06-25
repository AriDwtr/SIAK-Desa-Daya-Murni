<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class AdminJabatanController extends BaseController
{
    public function index()
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
            'jabatan' => $jabatan->orderBy('id_jabatan', 'DESC')->findAll()
        ];
        return view('admin/jabatan/jabatan', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $jabatan = new JabatanModel();
        $rules = [
            'jabatan'           => [
                'rules' => 'required|is_unique[tbl_jabatan.jabatan]',
                'errors' => [
                    'required' => 'Jabatan Harus diisi',
                    'is_unique' => 'Jabatan Telah Terdaftar'
                ]
            ],
        ];

        if ($this->validate($rules)) {
            $data = [
                'jabatan'           => $this->request->getPost('jabatan'),
                'status'            => $this->request->getPost('role'),
            ];
            $jabatan->insert($data);
            $session->setFlashdata('msg', 'Berhasil Menambahkan Jabatan Baru');
            return redirect()->route('admin.jabatan');
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
        $jabatan = new JabatanModel();
        $data = [
            'id_pegawai' => $session->get('id_pegawai'),
            'nip' => $session->get('nip'),
            'nama' => $session->get('nama'),
            'jk' => $session->get('jk'),
            'foto' => $session->get('foto'),
            'role' => $session->get('role'),
            'edit_jabatan' => $jabatan->find($id),
            'jabatan' => $jabatan->orderBy('id_jabatan', 'DESC')->findAll()
        ];
        return view('admin/jabatan/edit_jabatan', $data);
    }

    public function update($id)
    {
        $session = session();
        helper(['form']);
        $jabatan = new JabatanModel();
        $rules = [
            'jabatan'           => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan Harus diisi',
                ]
            ],
        ];

        if($this->validate($rules)){
            $data = [
                'jabatan'           => $this->request->getPost('jabatan'),
                'status'            => $this->request->getPost('role'),
            ];
        $jabatan->update($id, $data);
        $session->setFlashdata('msg', 'Berhasil Perbaharui data Jabatan');
        return redirect()->route('admin.jabatan');
        }else{
            $data = [
                'id_pegawai' => $session->get('id_pegawai'),
                'nip' => $session->get('nip'),
                'nama' => $session->get('nama'),
                'jk' => $session->get('jk'),
                'foto' => $session->get('foto'),
                'role' => $session->get('role'),
                'validation' => $this->validator,
                'edit_jabatan' => $jabatan->find($id),
                'jabatan' => $jabatan->orderBy('id_jabatan', 'DESC')->findAll()
            ];
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $session = session();
        $jabatan = new JabatanModel();
        $jabatan->delete($id);
        $session->setFlashdata('msg', 'Berhasil Menghapus Jabatan');
        return redirect()->back();
    }
}
