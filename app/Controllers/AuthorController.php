<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;

class AuthorController extends BaseController
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
    public function addmovie()
    {
        return view('author/addmoviepage');
    }

    public function submitmovie()
    {
        $datamovie = $this->request->getPost();
        $fileposter = $this->request->getFile('poster');
        
        $this->validation->run($datamovie, 'movie');
        $errors = $this->validation->getErrors();
        if ($errors) {
            session()->setFlashdata('titleError', $this->validation->getError('title'));
            session()->setFlashdata('synopsisError', $this->validation->getError('synopsis'));
            session()->setFlashdata('posterError', $this->validation->getError('poster'));
            session()->setFlashdata('genreError', $this->validation->getError('genre'));
            session()->setFlashdata('yearError', $this->validation->getError('year'));
            session()->setFlashdata('runtimeError', $this->validation->getError('runtime'));
            return redirect()->back()->withInput();
        }

        

        
        $newname = $fileposter->getRandomName();
        $fileposter = $this->request->getFile('poster');

        if($fileposter->isValid() && !$fileposter->hasMoved()) {
        $fileposter->move('/images', $newname);
        }

        $this->MovieModel->save([
            'title' => $datamovie['title'],
            'id_user' => $this->session->id_user,
            'synopsis' => $datamovie['synopsis'],
            'poster' => $newname,
            'trailer' => $datamovie['trailer'],
            'genre' => $datamovie['genre'],
            'release_year' => $datamovie['year'],
            'runtime' => $datamovie['runtime'],
            'cast' => $datamovie['cast'],
            'age' => $datamovie['age'],
        ]);

        return redirect()->to('/mymovie');
    }
    public function mymovie()
    {
        return view('author/mymovie');
    }

}
