<?php 

class DataSiswa extends CI_Controller{

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
		$data['title'] = "Data Siswa";
		$data['siswa'] = $this->sppModel->get_data('siswa')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataSiswa',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData(){
		$data['title'] = "Tambah Data Siswa";
		$data['spp'] = $this->sppModel->get_data('spp')->result();
		$data['kelas'] = $this->sppModel->get_data('kelas')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataSiswa',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$nisn = $this->input->post('nisn');
			$nis = $this->input->post('nis');
			$nama = $this->input->post('nama');
			$nama_kelas = $this->input->post('nama_kelas');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$tahun_ajaran = $this->input->post('tahun_ajaran');

			$data = array(
				'nisn' => $nisn, 
				'nis' => $nis, 
				'nama' => $nama, 
				'nama_kelas' => $nama_kelas,
				'alamat' => $alamat,  
				'no_telp' => $no_telp, 
				'tahun_ajaran' => $tahun_ajaran,
			);

			$this->sppModel->insert_data($data,'siswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSiswa');
		}
	}

	public function updateData($nisn){
		$data['title'] = "Update Data Siswa";
		$data['kelas'] = $this->sppModel->get_data('kelas')->result();
		$data['spp'] = $this->sppModel->get_data('spp')->result();
		$data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE nisn='$nisn'")->result();
		$where  = array('nisn' => $nisn);
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataSiswa',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->updateData();
		}else{
			$nisn = $this->input->post('nisn');
			$nis = $this->input->post('nis');
			$nama = $this->input->post('nama');
			$nama_kelas = $this->input->post('nama_kelas');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$tahun_ajaran = $this->input->post('tahun_ajaran');

			$data = array(
				'nisn' => $nisn, 
				'nis' => $nis, 
				'nama' => $nama, 
				'nama_kelas' => $nama_kelas,
				'alamat' => $alamat,  
				'no_telp' => $no_telp, 
				'tahun_ajaran' => $tahun_ajaran,
			);

			$where = array(
				'nisn' => $nisn, 
			);

			$this->sppModel->update_data('siswa',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Data berhasil diupdate!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSiswa');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('nisn','NISN','required');
		$this->form_validation->set_rules('nis','NIS','required');
		$this->form_validation->set_rules('nama','Nama Siswa','required');
		$this->form_validation->set_rules('nama_kelas','Kelas','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','Telepon','required');
		$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
	}

	public function deleteData($nisn){
		$where  = array('nisn' => $nisn);
		$this->sppModel->delete_data($where,'siswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data berhasil dihapus!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/dataSiswa');
	}

}


 ?>