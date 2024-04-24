<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;
use App\Models\RatingModel;


class UsersController extends BaseController
{
    protected $UsersModel;
    protected $session;
    protected $validation;
    protected $MovieModel;
    protected $RatingModel;
    public function __construct() {
        $this->session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
        $this->MovieModel = new MovieModel();
        $this->RatingModel = new RatingModel();
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
        $rating = $this->RatingModel->where('id_movie', $id)->findAll();
        $data = [
            'movie' => $moviedetail,
            'rating' => $rating
        ];
        return view('users/moviedetail', $data);
    }

    public function search()
    {
        $data = $this->request->getPost();
        $keyword = $data['keyword'];
        $movie = $this->MovieModel->like('title', $keyword)->findAll();
        
        $data = [
            'movie' => $movie,
            'keyword' => $keyword,
        ];
        return view('users/searchresult', $data);
    }
}
