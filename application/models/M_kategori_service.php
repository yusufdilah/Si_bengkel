<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori_service extends CI_Model {
	public function select_all_kategori() {
		$sql = "SELECT * FROM tbl_kategori_service";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_all() {
		$sql = "SELECT * FROM tbl_kategori_service";

		$data = $this->db->query($sql);

		return $data->result();
	}

	

	public function select_by_id($id) {
		$sql = "SELECT * from tbl_kategori_service WHERE  id_kategori = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_detail_kategori($id) {
		$sql = "SELECT * FROM tbl_kategori_service 
				left join tbl_detail_kategori_service 
				on 
				tbl_kategori_service.id_kategori = tbl_detail_kategori_service.id_kategori
				where 
				tbl_detail_kategori_service.id_kategori = {$id}";
		// print_r($this->db->last_query());die();		
		$data = $this->db->query($sql);
		// print_r($this->db->last_query());die();
		return $data->result();
	}	

	public function update($data_edit){
		$post = $this->input->post();
		// $this->_deleteImage($id);
		$updated_by = $this->session->userdata('username');
		date_default_timezone_set("Asia/Jakarta");	
        $updated_date = date('Y-m-d H:i:s');

		$this->db->where('id_kategori', $data_edit['id_kategori']);
	    $this->db->update('tbl_kategori_service', $data_edit); 
	    return $this->db->affected_rows();
	}

	

	public function delete($id) {
		$sql = "DELETE FROM tbl_kategori_service WHERE id_kategori='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function insert($data) {
	// 	$id = md5(DATE('ymdhms').rand());
	// 	$sql = "INSERT INTO pegawai VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }
	// public function insert($data) {
	// 	// $id = md5(DATE('ymdhms').rand());
	// 	$sql = "INSERT INTO tbl_kategori_service VALUES('" .$data['kategori_service'] ."')";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	public function insert($data_add){
		
		$this->db->insert('tbl_kategori_service', $data_add);
		return $this->db->affected_rows();
		 // print_r($this->db->last_query());die();
	}
	public function insertDetail($data_add){
		
		$this->db->insert('tbl_detail_kategori_service', $data_add);
		return $this->db->affected_rows();
		 // print_r($this->db->last_query());die();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */