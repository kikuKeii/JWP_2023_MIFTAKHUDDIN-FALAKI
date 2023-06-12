<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function home()
    {
        $cek_login = (!session()->get('isLoggedIn')) ? 'Login' : 'Dashboard';
        return view('home', [
            'title' => 'Home',
            'cek_login' => $cek_login
        ]);
    }
}
