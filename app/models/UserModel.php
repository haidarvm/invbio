<?php

class UserModel extends Db  {
    protected $table = 'user';

    protected $primaryKey = 'user_id';
    protected $mcat;

    public $timestamps = false;

    public function getAll($search = null) {
        return $this->get();
    }

    public function getUser($user_id) {
        return $this->where("user_id", $user_id)->first();
    }


  
}