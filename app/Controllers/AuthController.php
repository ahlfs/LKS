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
    protected $validation;

    public function __construct()
    {
        $this->session = \Config\Services::session(); 
        $this->UsersModel = new UsersModel();
        $this->validation = \Config\Services::validation();
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
            session()->setFlashdata('usernameError', 'Username not found!');
            return redirect()->back()->withInput();
        }

        elseif (!$users['password'] == md5($data['password'])) {
            session()->setFlashdata('usernameError', 'Wrong password!');
            return redirect()->back()->withInput();
        }

        elseif ($users['level'] == 1) {
            $role = 'Subs';
        }
        elseif ($users['level'] == 2) {
            $role = 'Author';
        }
        elseif ($users['level'] == 3) {
            $role = 'Admin';
        }
        

        $datasession = [
            'isLogin' => true,
            'username' => $users['username'],
            'id_user' => $users['id_user'],
            'level' => $users['level'],
            'role' => $role
        ];

        $this->session->set($datasession);
        return redirect()->to('/');


    }

    public function valid_register() {
        $dataregister = $this->request->getPost();
        $this->validation->run($dataregister, 'register');
        $errors = $this->validation->getErrors();
        if ($errors) {
            session()->setFlashdata('usernameError', $this->validation->getError('username'));
            session()->setFlashdata('emailError', $this->validation->getError('email'));
            session()->setFlashdata('passwordError', $this->validation->getError('password'));
            session()->setFlashdata('confirmError', $this->validation->getError('confirm'));
            return redirect()->back()->withInput();
        }
        $this->UsersModel->save([
            'username' => $dataregister['username'],
            'email' => $dataregister['email'],
            'password' => md5($dataregister['password']),
            'level' => 1,
        ]);

        $data = [
            'successmessage' => 'Account Created'
        ];

        return view('/auth/loginpage', $data);
        
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
