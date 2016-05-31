<?php

class Encriptar extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
    }
    public function index(){
        $nombre='admin';
        $salida= password_hash($nombre, PASSWORD_DEFAULT);
        echo $salida;
    }
}

