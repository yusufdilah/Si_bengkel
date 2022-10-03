<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_service extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kategori_service');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		

		$data['page'] = "Kategori service";
		$data['judul'] = "Data Kategori Service";
		$data['deskripsi'] = "Manage Data Kategori Service";

		$data['modal_tambah_kategori_service'] = show_my_modal('modals/modal_tambah_kategori_service', 'tambah-kategori_service', $data);

		$this->template->views('kategori_service/home', $data);
	}

	public function tampil() {
		$data['dataKategori'] = $this->M_kategori_service->select_all();
		$this->load->view('kategori_service/list_data', $data);
	}

	public function tampil_detail() {
		$data['dataKategori'] = $this->M_kategori_service->select_all();
		$this->load->view('kategori_service/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('kategori_service', 'Nama Kategori service', 'trim|required');

		$data = $this->input->post();
		$created_by = $this->session->userdata('username');
		// echo $created_by. 'OK';die();
		if ($this->form_validation->run() == TRUE) {
			$data_add=[
                            'kategori_service' => $this->input->post('kategori_service'),
                            'created_by' => $created_by
                        ];
			$result = $this->M_kategori_service->insert($data_add);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahDetail() {
		$this->form_validation->set_rules('detail_kategori_service', 'Nama Jenis service', 'trim|required');

		$data = $this->input->post();
		$id = $this->input->post('id_kategori');
		$created_by = $this->session->userdata('username');
		// echo $created_by. 'OK';die();
		if ($this->form_validation->run() == TRUE) {
			$data_add=[
                            'detail_kategori_service' => $this->input->post('detail_kategori_service'),
                            'id_kategori' => $this->input->post('id_kategori'),
                            'created_by' => $created_by
                        ];
            // var_dump($data_add);die();            
			$result = $this->M_kategori_service->insertDetail($data_add);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Detail Berhasil ditambahkan', '20px');
				// $this->session->set_flashdata('success', 'Tambah Detail  Berhasil Disimpan');
            	// redirect('kategori_service/detail/'.$id);
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Detail Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataKategoriID'] = $this->M_kategori_service->select_by_id($id);
		$data['dataKategori'] = $this->M_kategori_service->select_all();
		$data['userdata'] = $this->userdata;

		// echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
		echo show_my_modal('modals/modal_update_kategori_service', 'update-kategori_service', $data);
	}

	public function prosesUpdate() {
		date_default_timezone_set("Asia/Jakarta");   
        $updated_date = date('Y-m-d H:i:s');
        $updated_by = $this->session->userdata('username');
		$this->form_validation->set_rules('kategori_service', 'Nama Kategori service', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$data_edit=[
                            "kategori_service"        => $this->input->post('kategori_service'),
                            "id_kategori"        => $this->input->post('id_kategori'),
                            'updated_date' => $updated_date
                        ];
			$result = $this->M_kategori_service->update($data_edit);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kategori Service Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kategori Service Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function detail($id) {
		$data['userdata'] 	= $this->userdata;

		// $id 				= trim($_POST['id']);
		$data['dataKategoriID'] = $this->M_kategori_service->select_by_id($id);
		$data['dataKategoriDetail'] = $this->M_kategori_service->select_detail_kategori($id);
		$data['page'] = "Detail Kategori service";
		$data['judul'] = "Detail Data Kategori Service";
		$data['deskripsi'] = "(Manage Detail : '".$data['dataKategoriID']->kategori_service."')";
		$data['modal_tambah_detail_kategori_service'] = show_my_modal('modals/modal_tambah_detail_kategori_service', 'tambah-kategori_service_detail', $data);

		// $this->load->view('kategori_service/detail_kategori_service', $data);
		// echo show_my_modal('modals/modal_detail_posisi', 'detail-posisi', $data, 'lg');
		$this->template->views('kategori_service/detail_kategori_service', $data);
		// echo show_my_modal('modals/modal_detail_kategori', 'detail-kategori_service', $data, 'lg');
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kategori_service->delete($id);
		// var_dump($result);die();
		if ($result > 0) {
			echo show_succ_msg('Data Kategori Service Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kategori Service Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "ID Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "ID Posisi");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Status");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_kota); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_kelamin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->id_posisi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->status); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pegawai.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pegawai.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_pegawai->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pegawai->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil diimport ke database'));
						redirect('Pegawai');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pegawai');
				}

			}
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */