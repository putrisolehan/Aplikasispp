<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
	  <div class="card-header bg-info text-white">
	    History Pembayaran
	  </div>
	  <div class="card-body">
	   	<form class="form-inline">
	   		<div class="form-group mb-2">
	   			<label for="staticEmail2 " >Bulan : </label>
	   			<select class="form-control ml-2" name="bulan">
   					<option value="">--Pilih Bulan--</option>
   					<option value="01">Januari</option>
   					<option value="02">Februari</option>
   					<option value="03">Maret</option>
   					<option value="04">April</option>
   					<option value="05">Mei</option>
   					<option value="06">Juni</option>
   					<option value="07">Juli</option>
   					<option value="08">Agustus</option>
   					<option value="09">September</option>
   					<option value="10">Oktober</option>
					<option value="11">November</option>
   					<option value="12">Desember</option>
   				</select>
	   		</div>

	   		<div class="form-group mb-2 ml-5">
	   			<label for="staticEmail2 " >Tahun : </label>
	   			<select class="form-control ml-2" name="tahun">
   					<option value="">--Pilih Tahun--</option>
   					<?php $tahun = date('Y'); 
   					for($i=2021;$i<$tahun+5;$i++) { ?>
	   					<option value="<?php echo $i ?>"><?php echo $i ?></option>
   					<?php } ?>
   				</select>
	   		</div>

	   		<button type="submit" class="btn btn-info mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
	   	</form>
	  </div>
	</div>


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
	

	<div class="alert alert-info">
		Menampilkan Data Pembayaran Bulan <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun <span class="font-weight-bold"><?php echo $tahun ?></span>
	</div>

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

		<?php $no=1; foreach ($pembayaran as $pem ) : ?>
			<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $pem->nisn ?></td>
                <td><?php echo $pem->nama_petugas ?></td>
    			<td><?php echo $pem->tgl_bayar ?></td>
    			<td><?php echo $pem->bulan_dibayar ?></td>
                <td><?php echo $pem->tahun_dibayar ?></td>
                <td><?php echo $pem->tahun_ajaran ?></td>
                <td><?php echo $pem->jumlah_bayar ?></td>
                <td><?php echo $pem->keterangan ?></td>
    		</tr>
		<?php endforeach; ?>
	</table>

</div>
