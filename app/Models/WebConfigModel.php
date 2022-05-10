<?php

namespace App\Models;

use CodeIgniter\Model;


class WebConfigModel extends Model
{
    protected $table      = 'web_config';
    protected $primaryKey = 'id';


    public function getWebConfig()
    {
        return $this->where(['id' => 1])->first();
    }
}
