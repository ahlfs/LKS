<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;
use App\Models\RatingModel;


class SubscriberController extends BaseController
{

    protected $UsersModel;
    protected $session;
    protected $validation;
    protected $MovieModel;
    protected $RatingModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
        $this->MovieModel = new MovieModel();
        $this->RatingModel = new RatingModel();
        $this->validation = \Config\Services::validation();
    }
    public function ratemovie($id)
    {
        $datapost = $this->request->getPost();
        $id_user = session('id_user');
        $username = session('username');

        $this->RatingModel->save([
            'id_user' => $id_user,
            'id_movie' => $id,
            'username' => $username,
            'message' => $datapost['message'],
            'rating' => $datapost['rating'],
        ]);

        return redirect()->back(); 
    }
}
