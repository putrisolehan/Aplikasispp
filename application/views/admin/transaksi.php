<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

     <a class="btn btn-sm btn-success mb-2" href="<?php echo base_url('admin/transaksi/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Transaksi</a>
     <?php echo $this->session->flashdata('pesan') ?>

     <table class="table table-bordered table-striped mt-2">
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
                <td>Rp.<?php echo number_format($pem->jumlah_bayar,0,',','.') ?></td>
                <td><?php echo $pem->keterangan ?></td>
    		</tr>
    	<?php endforeach; ?>
    </table>

</div>
