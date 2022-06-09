<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

     <a class="btn btn-sm btn-success mb-2" href="<?php echo base_url('admin/dataSiswa/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
     <?php echo $this->session->flashdata('pesan') ?>

     <table class="table table-bordered table-striped mt-2">
    	<tr>
    		<th class="text-center">No</th>
    		<th class="text-center">NISN</th>
    		<th class="text-center">NIS</th>
    		<th class="text-center">Nama Siswa</th>
    		<th class="text-center">Kelas</th>
    		<th class="text-center">Alamat</th>
    		<th class="text-center">Telepon</th>
    		<th class="text-center">Tahun Ajaran</th>
    		<th class="text-center">Action</th>
    	</tr>

    	<?php $no=1; foreach ($siswa as $sis ) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $sis->nisn ?></td>
    			<td><?php echo $sis->nis ?></td>
    			<td><?php echo $sis->nama ?></td>
    			<td><?php echo $sis->nama_kelas ?></td>
    			<td><?php echo $sis->alamat ?></td>
    			<td><?php echo $sis->no_telp ?></td>
    			<td><?php echo $sis->tahun_ajaran ?></td>
    			<td>
    				<center>
    					<a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/dataSiswa/updateData/'.$sis->nisn) ?>"><i class="fas fa-edit"></i></a>
    					<a onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSiswa/deleteData/'.$sis->nisn) ?>"><i class="fas fa-trash"></i></a>
    				</center>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </table>

</div>
