<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('DateTime', null, 'clock');

        require_once APPPATH . 'libraries/MY_Grocery_CRUD.php';
        $this->load->library('MY_grocery_CRUD', null, 'crud');

        $this->load->library('tank_auth', null, 'auth');

        // authコントローラ以外ではログインを要求する
        if ( ! $this->auth->is_logged_in() && $this->router->class != 'auth') {
            redirect('/auth/login/');
        }
    }
}
