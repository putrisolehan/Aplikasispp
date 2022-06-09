<?php 

class Transaksi extends CI_Controller{

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
		$data['title'] = "Transaksi Pembayaran";
		$data['pembayaran'] = $this->sppModel->get_data('pembayaran')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData(){
		$data['title'] = "Tambah Data Transaksi";
		$data['spp'] = $this->sppModel->get_data('spp')->result();
		$data['petugas'] = $this->sppModel->get_data('petugas')->result();
		$data['siswa'] = $this->sppModel->get_data('siswa')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataTransaksi',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi(){
		$this->_rules();

		if($this->form_validation->run()== FALSE) {
			$this->tambahData();
		}else{
			$nisn = $this->input->post('nisn');
			$nama_petugas = $this->input->post('nama_petugas');
			$tgl_bayar = $this->input->post('tgl_bayar');
			$bulan = $this->input->post('bulan');
			$bulan_dibayar = $this->input->post('bulan_dibayar');
			$tahun_dibayar = $this->input->post('tahun_dibayar');
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$jumlah_bayar = $this->input->post('jumlah_bayar');
			$keterangan = $this->input->post('keterangan');

			$data = array(
				'nisn' => $nisn,
				'nama_petugas' => $nama_petugas,  
				'tgl_bayar' => $tgl_bayar, 
				'bulan' => $bulan,
				'bulan_dibayar' => $bulan_dibayar,
				'tahun_dibayar' => $tahun_dibayar,
				'tahun_ajaran' => $tahun_ajaran, 
				'jumlah_bayar' => $jumlah_bayar, 
				'keterangan' => $keterangan, 
			);

			$this->sppModel->insert_data($data,'pembayaran');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data berhasil ditambahkan!</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
			redirect('admin/transaksi');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('nisn','NISN','required');
		$this->form_validation->set_rules('nama_petugas','Nama Petugas','required');
		$this->form_validation->set_rules('tgl_bayar','Tanggal Bayar','required');
		$this->form_validation->set_rules('bulan','Bulan dan Tahun Bayar','required');
		$this->form_validation->set_rules('bulan_dibayar','Bulan Dibayar','required');
		$this->form_validation->set_rules('tahun_dibayar','Tahun Dibayar','required');
		$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
		$this->form_validation->set_rules('jumlah_bayar','Jumlah Bayar','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
	}

}


 ?>