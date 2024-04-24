<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;

class AdminController extends BaseController
{
    protected $UsersModel;
    protected $session;
    protected $validation;
    protected $MovieModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
        $this->MovieModel = new MovieModel();
        $this->validation = \Config\Services::validation();
    }
    
    public function usercontrol()
    {
        $daftaruser = $this->UsersModel->findAll();

        foreach ($daftaruser as $du){
            if ($du['level'] == '1') {
                $du['level'] == 'Subscriber';
            }
            elseif ($du['level'] == '2') {
                $du['level'] == 'Author';
            }
            elseif ($du['level'] == 3) {
                $du['level'] == 'Admin';
            }
        }

        $data = [
            'daftaruser' => $daftaruser
        ];

        
        return view('admin/usercontrol', $data);
    }


    public function edituser($id) {
        $datauser = $this->UsersModel->where('id_user', $id)->first();
        
        $data = [
            'datauser' => $datauser
        ];
        return view('/admin/edituser', $data);
    }

    public function updateuser($id) {
        $datapost = $this->request->getPost();
        $datauser = $this->UsersModel->where('id_user', $id)->first();

        if (!$datapost['username'] == $datauser['username']) {
            $this->validation->run($datapost, 'username');
            $errors = $this->validation->getErrors();
            if ($errors) {
                session()->setFlashdata('usernameError', $this->validation->getError('username'));
                return redirect()->back()->withInput();
            }
        }

        if (!$datapost['email'] == $datauser['email']) {
            $this->validation->run($datapost, 'email');
            $errors = $this->validation->getErrors();
            if ($errors) {
                session()->setFlashdata('usernameError', $this->validation->getError('email'));
                return redirect()->back()->withInput();
            }
        }
        
        
        $newpass = $datauser['password'];
        if (!$datapost['password'] == '') {
            if (!$datapost['password'] == $datapost['confirm']) {
                session()->setFlashdata('confirmError', 'Confirm password and password not matches');
                return redirect()->back()->withInput();
            }
            $newpass = md5($datapost['password']);
        }

        $this->UsersModel->save([
            'id_user' => $id,
            'username' => $datapost['username'],
            'email' => $datapost['email'],
            'password' => $newpass,
            'level' => $datapost['level'],
        ]);

        
        return redirect()->to('/usercontrol');
    }

    public function deleteuser($id) {
        $this->UsersModel->where('id_user', $id)->delete();
        return redirect()->to('/usercontrol');
    }

}
