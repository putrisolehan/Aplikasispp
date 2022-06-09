<?php 

class DataKelas extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('hak_akses') !='2') {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda belum login!</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('welcome');
		}
	}

	public function index(){
		$data['title'] = "Data Kelas";
		$data['kelas'] = $this->sppModel->get_data('kelas')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataKelas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData(){
		$data['title'] = "Tambah Data Kelas";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataKelas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$nama_kelas = $this->input->post('nama_kelas');
			$kompetensi_keahlian = $this->input->post('kompetensi_keahlian');

			$data = array(
				'nama_kelas' => $nama_kelas, 
				'kompetensi_keahlian' => $kompetensi_keahlian, 
			);

			$this->sppModel->insert_data($data,'kelas');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataKelas');
		}
	}

	public function updateData($id){
		$data['title'] = "Update Data Kelas";
		$where  = array('id_kelas' => $id);
		$data['kelas'] = $this->db->query("SELECT * FROM kelas WHERE id_kelas = '$id'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataKelas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$id = $this->input->post('id_kelas');
			$nama_kelas = $this->input->post('nama_kelas');
			$kompetensi_keahlian = $this->input->post('kompetensi_keahlian');

			$data = array(
				'nama_kelas' => $nama_kelas, 
				'kompetensi_keahlian' => $kompetensi_keahlian, 
			);

			$where = array(
				'id_kelas' => $id, 
			);

			$this->sppModel->update_data('kelas',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataKelas');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('nama_kelas','Nama Kelas','required');
		$this->form_validation->set_rules('kompetensi_keahlian','Kompetensi Keahlian','required');
	}

	public function deleteData($id){
		$where  = array('id_kelas' => $id);
		$this->sppModel->delete_data($where,'kelas');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataKelas');
	}

}


 ?>