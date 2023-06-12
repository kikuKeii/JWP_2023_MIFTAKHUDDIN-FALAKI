<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function auth()
    {
        $rules = [
            'email'         => 'required',
            'password'      => 'required'
        ];
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $userModel->where('email', $email)->first();

            if ($data) {
                $pass = $data['password'];
                $passwordCheck = password_verify($password, $pass);
                if ($passwordCheck) {
                    $session_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'isLoggedIn' => TRUE
                    ];
                    session()->set($session_data);
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/login')->withInput()->with('message', 'Email does not exist or Password is incorrect.');
                }
            } else {
                return redirect()->to('/login')->withInput()->with('message', 'Email does not exist or Password is incorrect.');
            }
        } else {
            return redirect()->to('/login')->withInput();
        }
    }
}
