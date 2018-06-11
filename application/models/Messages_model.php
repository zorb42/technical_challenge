<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model {

	function insert($data) {
		return $this->db->insert('messages', $data);
	}

	function delete($id) {
		return $this->db->delete('messages', ['id' => $id]);
	}

	function get_all(){
		return $this->db->get('messages')->result();
	}

	function get($id) {
		return $this->db->get_where('messages', ['id' => $id])->first_row();
	}

} //.class_model