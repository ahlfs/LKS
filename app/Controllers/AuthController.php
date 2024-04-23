<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use CodeIgniter\Model;

class AuthController extends BaseController
{
    protected $UsersModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session(); 
        $this->UsersModel = new UsersModel();
    }
    public function login()
    {
        return view('/auth/loginpage');
    }

    public function register()
    {
        return view('/auth/registerpage');
    }

    public function valid_login() {
        $data = $this->request->getPost();
        $users = $this->UsersModel->where('username', $data['username'])->first();
        
        if ($users == '') {
            return redirect()->back()->withInput();
        }

        if (!$users['password'] == md5($data['password'])) {
            return redirect()->back()->withInput();
        }

        $datasession = [
            'isLogin' => true,
            'id_user' => $users['id_user'],
        ];

        $this->session->set($datasession);
        return redirect()->to('/');


    }

    public function valid_register() {
        $dataregister = $this->request->getPost();
        $this->UsersModel->save([
            'username' => $dataregister['username'],
            'email' => $dataregister['email'],
            'password' => md5($dataregister['password']),
            'level' => 'user',
        ]);

        $data = [
            'successmessage' => 'Account Created'
        ];

        return view('/auth/loginpage', $data);
        
    }
}
