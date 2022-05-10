<?php

namespace App\Models;

use CodeIgniter\Model;


class FilmModel extends Model
{
    protected $table      = 'films';
    protected $primaryKey = 'title';

    protected $allowedFields = ['publisher', 'title', 'release', 'image_url', 'trailer', 'synopsis'];

    public function getFilm($title = false)
    {
        if ($title == false) {
            return $this->findAll();
        }
        return $this->like('title', $title)->paginate(4, 'films');
    }
    public function getExactFilm($title)
    {
        return $this->where(['title' => $title])->first();
    }

    public function getFilmByPublisher($publisher)
    {
        return $this->where(['publisher' => $publisher])->paginate(4, 'films');
    }

    public function getFilmByPublisherAndTitle($title = false, $publisher = false)
    {
        $this->where(['publisher' => $publisher]);
        $this->like('title', $title);
        return $this->paginate(4, 'films');
    }

    public function addFilm($film)
    {
        $this->set($film);

        return $this->insert();
    }

    public function deleteFilm($title)
    {
        return $this->delete(['title' => $title]);
    }

    public function updateFilm($film)
    {
        $this->set($film);
        $this->where('title', $film['title']);
        return $this->update();
    }
}
