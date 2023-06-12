<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        return view('auth/forgot', [
            'title' => 'Forgot Password'
        ]);
    }
    public function getToken()
    {
        helper('text');
        $token =  random_string('alnum', 5);
        $userModel = new UserModel();
        $getEmail = $this->request->getVar('email');

        $data = $userModel->where('email', $getEmail)->first();
        if ($data) {
            $userModel->save([
                'id' => $data['id'],
                'token' => $token,
            ]);

            $subject = 'Rest Password';
            $message = view('auth/emails/forgot', ['token' => $token]);

            $email = \Config\Services::email();
            $email->setTo($data['email']);
            $email->setFrom('miftakhuddinfalaki@gmail.com', 'Miftakhuddin Falaki (Dev Codeigniter)');

            $email->setSubject($subject);
            $email->setMessage($message);
            if ($email->send()) {
                return redirect()->to('/forgot/new-password')->withInput()->with('message', 'Token has send to email. Check your email. dont forget to check your spam email');
            } else {
                return redirect()->to('/forgot/')->with('message', 'System error');
            }
        } else {
            return redirect()->to('/forgot/')->with('message', 'Email not found');
        }
    }
    public function newPassword()
    {
        return view('auth/new_password', ['title' => 'New Password']);
    }
    public function store()
    {
        $rules = [
            'token'      => 'required',
            'password'      => 'required|min_length[4]|max_length[50]',
            'pass_confirm'  => [
                'rules' => 'matches[password]',
                'errors' => ['matches' => 'Passoword do not match']
            ]
        ];
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $email = $this->request->getVar('email');
            $token = $this->request->getVar('token');

            $data = $userModel->where('email', $email)->first();
            if ($data['token'] === $token) {
                $userModel->save([
                    'id' => $data['id'],
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token' => null
                ]);
            }

            return redirect()->to('/login')->with('message', 'Password has changed please login.');
        } else {
            return redirect()->to('/forgot/new-password')->withInput();
        }
    }

    private function sendEmail($token, $to,)
    {
        $subject = 'Rest Password';
        $message = view('auth/emails/forgot', ['token' => $token]);

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('miftakhuddinfalaki@gmail.com', 'Miftakhuddin Falaki (Dev Codeigniter)');

        $email->setSubject($subject);
        $email->setMessage($message);
        // if ($email->send()) {
        //     echo 'Email successfully sent';
        // } else {
        //     $data = $email->printDebugger(['headers']);
        //     print_r($data);
        // }
    }
}
