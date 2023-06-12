<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\Session\Session;

class RegisterController extends BaseController
{
    public function index()
    {
        Session();
        return view('auth/register', [
            'title' => 'Register',
        ]);
    }
    public function store()
    {
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'pass_confirm'  => [
                'rules' => 'matches[password]',
                'errors' => ['matches' => 'Passoword do not match']
            ],
            'img_profile' => [
                'rules' => 'max_size[img_profile,3124]|is_image[img_profile]|mime_in[img_profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Image size is too large',
                    'is_image' => 'What you select is not an image',
                    'mime_in' => 'What you select is not an image'
                ]
            ],
        ];

        if ($this->validate($rules)) {
            $image = $this->request->getFile('img_profile');
            if ($image->getError() == 4) {
                $titleImage = 'default_profile.jpg';
            } else {
                $titleImage = $image->getRandomName();
                $image->move('assets/img/profile-img', $titleImage);
            }

            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'profile_img' =>  $titleImage
            ];
            $userModel->save($data);
            return redirect()->to('/login')->with('message', 'Register complite please login.');
        } else {
            return redirect()->to('/register')->withInput();
        }
    }
}
