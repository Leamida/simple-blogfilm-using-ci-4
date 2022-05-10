<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'username';

    protected $allowedFields = ['username', 'password'];

    public function getUser($username, $password)
    {
        $user = [
            'username' => $username,
            'password' => $password
        ];
        if ($this->where(['username' => $username])->first()) {
            $userdb = $this->where($user)->first();
            if ($userdb) {
                return $userdb;
            }
        } else {
            $this->set($user);
            $this->insert();
            return $this->where($user)->first();
        }
    }
}
