<?php

class UserModel extends Db {
    protected $table = 'user';

    protected $primaryKey = 'user_id';
    protected $mcat;

    public $timestamps = false;

    public function login($username, $pass) {
        return $this->where(['username' => $username, 'password' => sha1($pass)])->first();
    }

    public function getAll($search = null) {
        return $this->get();
    }

    public function getUser($user_id) {
        return $this->where('user_id', $user_id)->first();
    }
}
