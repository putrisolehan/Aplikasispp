<?php 

class UbahPassword extends CI_Controller{
	public function index()
	{
		$data['title'] = "Ubah Password";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('formUbahPassword',$data);
		$this->load->view('templates_admin/footer');
	}

	public function ubahPasswordAksi()
	{
		$passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');

		$this->form_validation->set_rules('passBaru','Password Baru','required|matches[ulangPass]');
		$this->form_validation->set_rules('ulangPass','Ulangi Password','required');

		if($this->form_validation->run()!=FALSE) {
			$data = array('password' => md5($passBaru));
			$id = array('id_petugas' => $this->session->userdata('id_petugas') );
			$this->sppModel->update_data('petugas',$data,$id);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Password berhasil diubah!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('welcome');
		}else{
			$data['title'] = "Ubah Password";
			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('formUbahPassword',$data);
			$this->load->view('templates_admin/footer');
		}

	}
}

 ?>