<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	function index(){
		$this->load->view('layouts/header');
		$this->load->view('home/index.html');
		$this->load->view('layouts/footer');
	} //.index
}