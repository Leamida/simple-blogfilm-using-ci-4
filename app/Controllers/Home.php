<?php

namespace App\Controllers;


class Home extends BaseController
{

    public function index()
    {
        if ($this->Session->has('username')) {
            return redirect()->to('user');
        }

        $config = $this->WebConfigModel->getWebConfig();

        $title = $this->request->getVar('title');
        if ($title) {
            $data = [
                'title' => 'Home',
                'films' => $this->FilmModel->getFilm($title),
                'pager' => $this->FilmModel->pager,
                'config' => $config
            ];
        } else {
            $data = [
                'title' => 'Home',
                'films' => $this->FilmModel->paginate(4, 'films'),
                'pager' => $this->FilmModel->pager,
                'config' => $config
            ];
        }


        return view('home', $data);
    }

    public function auth()
    {
        $config = $this->WebConfigModel->getWebConfig();
        if ($this->Session->has('username')) {
            return redirect()->to('user');
        }

        $data = [
            'title' => 'Auth',
            'config' => $config
        ];
        return view('auth', $data);
    }

    public function validation()
    {
        $data = [
            'title' => 'Auth'
        ];
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->UserModel->getUser($username, $password);
        if ($user) {
            $this->Session->set('username', $username);
            return redirect('user');
        } else {
            $this->Session->setFlashdata('alert', 'Login Failed');
            return redirect()->to('auth');
        }
    }
}
