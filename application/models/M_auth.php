<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function login($user, $pass) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));
		
		$data = $this->db->get();
		// print_r($this->db->last_query());die();
		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */