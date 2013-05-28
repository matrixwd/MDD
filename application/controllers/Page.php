<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->view('header');
        $this->load->view('content_home');
        $this->load->view('footer');
    }

    public function about() {
        $this->load->view('header');
        $this->load->view('content_about');
        $this->load->view('footer');
    }

    public function pilot_map(){

    }

}
