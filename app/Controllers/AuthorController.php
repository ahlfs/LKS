<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\MovieModel;
use App\Models\RatingModel;

class AuthorController extends BaseController
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
        $this->RatingModel = new MovieModel();
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


        $fileposter->move('images', $newname);


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
        $id_user = session('id_user');
        $movie = $this->MovieModel->where('id_user', $id_user)->findAll();
        $data = [
            'movie' => $movie
        ];
        return view('author/mymovie', $data);
    }

    public function editmovie($id)
    {
        $datamovie = $this->MovieModel->where('id_movie', $id)->first();

        $data = [
            'datamovie' => $datamovie
        ];
        return view('/author/editmovie', $data);
    }

    public function updatemovie($id)
    {
        $datamovie = $this->request->getPost();
        $datamovieold = $this->MovieModel->where('id_movie', $id)->first();
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



        if (!$fileposter == '') {
            $newname = $fileposter->getRandomName();
            $fileposter = $this->request->getFile('poster');
            if ($fileposter->isValid() && !$fileposter->hasMoved()) {
                $fileposter->move('images', $newname);
            }
        }

        if ($fileposter == '') {
            $newname = $datamovieold['poster'];
        }

        $this->MovieModel->save([
            'id_movie' => $id,
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

        return redirect()->to('/moviedetail/' . $id);
    }

    public function deletemovie($id)
    {
        $this->MovieModel->where('id_movie', $id)->delete();
        return redirect()->to('/mymovie');
    }
}
