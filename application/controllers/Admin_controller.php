<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Messages_model', 'messages');
	}

	function index(){

		$data = ['data' => $this->messages->get_all()];
		$this->load->view('layouts/header');
		$this->load->view('admin/index', $data);
		$this->load->view('layouts/footer');

	} //.index

	function insert_message() {

		if (!$this->input->is_ajax_request())
			redirect(base_url(),'refresh');

		$dados = $this->input->post();

		if($this->messages->insert($dados))
			echo json_encode(['return' => "Message sended!"]);
		else
			echo json_encode(['return' => "Something wrong happened. Try again"]);
	}

	function delete_message() {

		if(!$this->input->is_ajax_request())
			redirect(base_url(),'refresh');

		if($this->messages->delete($this->input->post('id')))
			echo json_encode(['return' => "Message deleted!"]);
		else
			echo json_encode(['return' => "Something wrong happened. Try again"]);
	}

	function get_message() {
		
		if(!$this->input->is_ajax_request())
			redirect(base_url(),'refresh');

		if($data = $this->messages->get($this->input->post('id')))
			echo json_encode($data);
		else
			echo json_encode(['return' => "Something wrong happened. Try again"]);
	}

}