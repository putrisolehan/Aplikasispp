<?php 

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('hak_akses') !='1') {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda belum login!</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>');
				redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$id=$this->session->userdata('id_petugas');
		$data['petugas'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas='$id'")->result();
		$this->load->view('templates_petugas/header',$data);
		$this->load->view('templates_petugas/sidebar');
		$this->load->view('petugas/dashboard',$data);
		$this->load->view('templates_petugas/footer');
	}
}

 ?>