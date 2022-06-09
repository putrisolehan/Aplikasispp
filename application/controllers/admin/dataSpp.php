<?php 

class DataSpp extends CI_Controller{

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
		$data['title'] = "Data SPP";
		$data['spp'] = $this->sppModel->get_data('spp')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataSpp',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData(){
		$data['title'] = "Tambah Data SPP";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataSpp',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$nominal = $this->input->post('nominal');

			$data = array(
				'tahun_ajaran' => $tahun_ajaran, 
				'nominal' => $nominal, 
			);

			$this->sppModel->insert_data($data,'spp');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSpp');
		}
	}

	public function updateData($id){
		$data['title'] = "Update Data SPP";
		$where  = array('id_spp' => $id);
		$data['spp'] = $this->db->query("SELECT * FROM spp WHERE id_spp = '$id'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataSpp',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->updateData();
		}else{
			$id = $this->input->post('id_spp');
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$nominal = $this->input->post('nominal');

			$data = array(
				'tahun_ajaran' => $tahun_ajaran, 
				'nominal' => $nominal, 
			);

			$where = array(
				'id_spp' => $id, 
			);

			$this->sppModel->update_data('spp',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSpp');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
		$this->form_validation->set_rules('nominal','Nominal','required');
	}

	public function deleteData($id){
		$where  = array('id_spp' => $id);
		$this->sppModel->delete_data($where,'spp');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSpp');
	}

}


 ?>