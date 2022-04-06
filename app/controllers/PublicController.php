<?php
use Symfony\Component\HttpFoundation\Session\Session;

class PublicController {
    public $session;
    public $var;

    public function __construct() {
        $this->var = "BioFarma";
        $this->session = new Session();
    }
}
