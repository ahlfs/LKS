<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;

class UsersController extends BaseController
{
    protected $UsersModel;
    protected $session;
    protected $validation;
    protected $MovieModel;
    public function __construct() {
        $this->session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
        $this->MovieModel = new MovieModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $movie = $this->MovieModel->findAll();
        $data = [
            'movie' => $movie
        ];
        return view('users/index', $data);
    }

    public function moviedetail($id)
    {
        $moviedetail = $this->MovieModel->where('id_movie', $id)->first();
        $data = [
            'movie' => $moviedetail
        ];
        return view('users/moviedetail', $data);
    }
}
