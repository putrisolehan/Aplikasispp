<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>

	<center>
		<h1>SMK NEGERI 4 BOGOR</h1>
		<h2>Laporan Pembayaran</h2>
	</center>

	<?php 
	if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	 ?>

	 <table>
	 	<tr>
	 		<td>Bulan</td>
	 		<td>:</td>
	 		<td><?php echo $bulan ?></td>
	 	</tr>
	 	<tr>
	 		<td>Tahun</td>
	 		<td>:</td>
	 		<td><?php echo $tahun ?></td>
	 	</tr>
	 </table>

	 <table class="table table-bordered table-striped">
		<tr>
			<th class="text-center">No</th>
    		<th class="text-center">NISN</th>
            <th class="text-center">Nama Petugas</th>
    		<th class="text-center">Tanggal Bayar</th>
    		<th class="text-center">Bulan yang dibayar</th>
            <th class="text-center">Tahun yang dibayar</th>
    		<th class="text-center">Tahun Ajaran</th>
    		<th class="text-center">Jumlah Bayar</th>
    		<th class="text-center">Keterangan</th>
		</tr>

		<?php $no=1; foreach ($cetakLaporan as $cl ) : ?>
			<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $cl->nisn ?></td>
                <td><?php echo $cl->nama_petugas ?></td>
    			<td><?php echo $cl->tgl_bayar ?></td>
    			<td><?php echo $cl->bulan_dibayar ?></td>
                <td><?php echo $cl->tahun_dibayar ?></td>
                <td><?php echo $cl->tahun_ajaran ?></td>
                <td><?php echo $cl->jumlah_bayar ?></td>
                <td><?php echo $cl->keterangan ?></td>
    		</tr>
		<?php endforeach; ?>
	</table>

	<table width="100%">
		<tr>
			<td></td>
			<td width="200px">
				<p>Bogor, <?php echo date("d M Y") ?><br> Staff Tata Usaha</p>
				<br>
				<br>
				<p>______________________</p>

			</td>
		</tr>
	</table>

</body>
</html>

<script type="text/javascript">
	window.print();
</script>