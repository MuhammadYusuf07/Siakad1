<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi' => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {

        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{fiel} Wajib Diisi !!!'
                ]
            ],
        ])) {
            //jikavalid
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    // jika data cocok
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    //login
                    return redirect()->to(base_url('admin'));
                } else {
                    // jika data tidak cocok
                    session()->setFlashdata('pesan','Login Gagal!, Username Atau password Salah !!');
                    return redirect()->to(base_url('auth/index'));
                }
            } elseif ($level == 2) {
                echo "Mahasiswa";
            } elseif ($level == 3) {
                echo "Dosen";
            }
        } else {
            //jikatidakvalid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses','Logout Suksesss !!!');
        return redirect()->to(base_url('auth/index'));
    }
}
