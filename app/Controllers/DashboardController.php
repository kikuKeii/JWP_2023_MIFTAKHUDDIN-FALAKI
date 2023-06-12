<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        // $user = $userModel->where('id',  session()->get('id'))->first();
        $user = $userModel->find(session()->get('id'));
        return view('dashboard/setting', [
            'title' => 'User Seting',
            'user' => $user,
        ]);
    }
    public function delete($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);
        if ($user['profile_img'] != 'default_profile.jpg') {
            unlink('assets/img/profile-img/' . $user['profile_img']);
        }
        $userModel->delete($id);
        session_destroy();
        return redirect()->to('/');
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}
