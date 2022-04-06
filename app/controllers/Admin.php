<?php
use Symfony\Component\HttpFoundation\Session\Session;

class Admin {
    public $session;
    public $var;

    public function __construct() {
        $this->session = new Session();
        $this->var = "arfa";
        // print_r($this->session);exit;
        if (!$this->session->get('user_data')) {
            header('Location: ' . base_url() . 'auth');
        } else {
            return true;
        }
    }

    public function admin_only() {
        // $admin = [1, 0];
        // if (in_array($this->acl_id, $admin)) {
        //     return true;
        // }
        // header('Location: ' . base_url() . 'home');
    }
}
