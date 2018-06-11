<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function index(){
		$this->load->view('layouts/header');
		$this->load->view('home/index.html');
		$this->load->view('layouts/footer');
	} //.index

	function contact(){
		$this->load->view('layouts/header');
		$this->load->view('home/contact.html');
		$this->load->view('layouts/footer');
	}

}