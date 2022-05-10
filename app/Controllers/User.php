<?php

namespace App\Controllers;


class User extends BaseController
{


    public function index()
    {

        $title = $this->request->getVar('title');
        $publisher = $this->Session->get('username');
        $config = $this->WebConfigModel->getWebConfig();
        if ($publisher) {
            if ($title) {
                $data = [
                    'title' => 'Home',
                    'films' => $this->FilmModel->getFilmByPublisherAndTitle($title, $publisher),
                    'pager' => $this->FilmModel->pager,
                    'config' => $config
                ];
            } else {
                $data = [
                    'title' => 'Home',
                    'films' => $this->FilmModel->getFilmByPublisher($publisher),
                    'user' => $publisher,
                    'pager' => $this->FilmModel->pager,
                    'config' => $config
                ];
            }
        } else {
            return redirect()->to('home');
        }
        return view('user/dashboard', $data);
    }

    public function logout()
    {
        $this->Session->remove('username');
        return redirect()->to('home');
    }

    public function add()
    {
        $film = [
            'title' => $this->request->getVar('titles'),
            'release' => $this->request->getVar('release'),
            'publisher' => $this->Session->get('username'),
            'image_url' => $this->request->getVar('image_url'),
            'synopsis' => $this->request->getVar('synopsis')
        ];
        $this->FilmModel->addFilm($film);

        return redirect()->to('user');
    }

    public function detail()
    {
        $config = $this->WebConfigModel->getWebConfig();
        $title = $this->request->getVar('title');
        if ($title) {
            $data = [
                'title' => 'Detail',
                'film' => $this->FilmModel->getExactFilm($title),
                'config' => $config
            ];

            return view('user/detail', $data);
        } else {
            return redirect()->to('home');
        }
    }

    public function delete()
    {
        $title = $this->request->getVar('title');
        if ($title) {

            $this->FilmModel->deleteFilm($title);
            return redirect()->to('user');
        } else {
            return redirect()->to('user');
        }
    }

    public function edit()
    {
        $title = $this->request->getVar('title');
        $config = $this->WebConfigModel->getWebConfig();
        if ($title) {
            $data = [
                'title' => 'Detail',
                'film' => $this->FilmModel->getExactFilm($title),
                'config' => $config
            ];

            return view('user/edit', $data);
        } else {
            return redirect()->to('user');
        }
    }

    public function update()
    {
        $film = [
            'title' => $this->request->getVar('titles'),
            'release' => $this->request->getVar('release'),
            'publisher' => $this->Session->get('username'),
            'image_url' => $this->request->getVar('image_url'),
            'synopsis' => $this->request->getVar('synopsis')
        ];
        $this->FilmModel->updateFilm($film);
        return redirect()->to('user');
    }
}
