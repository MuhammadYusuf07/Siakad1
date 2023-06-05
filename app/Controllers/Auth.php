<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi' => 'v_login'
        ];
        return view('layout/v_wrapper',$data);
    }

}