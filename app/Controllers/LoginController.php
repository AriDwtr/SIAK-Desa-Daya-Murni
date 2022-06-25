<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        $user = new UserModel();
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $user->where('username', $username)->first();
        if ($data) {
            $pegawai_password = $data['password'];
            $verify_password = password_verify($password, $pegawai_password);
            if ($verify_password) {
                $session_data = [
                    'id_pegawai' => $data['id_pegawai'],
                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'jk'=> $data['jk'],
                    'foto'=>$data['foto'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                if ($session_data['role']=="admin") {
                    $session->set($session_data);
                    return redirect()->route('admin.dashboard');
                }
                elseif ($session_data['role']=="pelayanan") {
                    $session->set($session_data);
                    return redirect()->route('pelayanan.dashboard');
                } elseif ($session_data['role']=="kades") {
                    $session->set($session_data);
                    return redirect()->route('kades.dashboard');
                }
            }else{
                $session->setFlashdata('msg', 'Password Salah Tolong Cek Ulang');
                return redirect()->route('loginsistem');
            }
        } else {
            $session->setFlashdata('msg', 'Ooops ID Login Tidak Terdaftar');
            return redirect()->route('loginsistem');
        }
        
    }
}
