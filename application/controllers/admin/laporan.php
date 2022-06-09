<?php 

class Laporan extends CI_Controller{

	public function index(){
		$data['title'] = "Laporan Pembayaran";
		$data['cetakLaporan'] = $this->db->query("SELECT * FROM pembayaran WHERE pembayaran.bulan='$bulantahun'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan');
		$this->load->view('templates_admin/footer');
	}

	public function cetakLaporan(){
		$data['title'] = "Cetak Laporan Pembayaran";
		if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
		$data['cetakLaporan'] = $this->db->query("SELECT * FROM pembayaran WHERE pembayaran.bulan='$bulantahun'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetakLaporan');
	}
}

 ?>