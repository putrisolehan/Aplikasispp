<?php 

class DataPetugas extends CI_Controller{

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
		$data['title'] = "Data Petugas";
		$data['petugas'] = $this->sppModel->get_data('petugas')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPetugas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData(){
		$data['title'] = "Tambah Data Petugas";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataPetugas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$nama_petugas = $this->input->post('nama_petugas');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$hak_akses = $this->input->post('hak_akses');

			$data = array(
				'nama_petugas' => $nama_petugas, 
				'username' => $username, 
				'password' => $password, 
				'level' => $level, 
				'hak_akses' => $hak_akses, 
			);

			$this->sppModel->insert_data($data,'petugas');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataPetugas');
		}
	}

	public function updateData($id){
		$data['title'] = "Update Data Petugas";
		$where  = array('id_petugas' => $id);
		$data['petugas'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataPetugas',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->updateData();
		}else{
			$id = $this->input->post('id_petugas');
			$nama_petugas = $this->input->post('nama_petugas');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$hak_akses = $this->input->post('hak_akses');

			$data = array(
				'nama_petugas' => $nama_petugas, 
				'username' => $username, 
				'password' => $password, 
				'level' => $level, 
				'hak_akses' => $hak_akses,
			);

			$where = array(
				'id_petugas' => $id, 
			);

			$this->sppModel->update_data('petugas',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataPetugas');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('nama_petugas','Nama Petugas','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('level','Status','required');
	}

	public function deleteData($id){
		$where  = array('id_petugas' => $id);
		$this->sppModel->delete_data($where,'petugas');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataPetugas');
	}

}


 ?>