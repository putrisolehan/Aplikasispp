<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-2" href="<?php echo base_url('admin/dataKelas/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
    	<tr>
    		<th class="text-center">No</th>
    		<th class="text-center">Kelas</th>
    		<th class="text-center">Kompetensi Keahlian</th>
    		<th class="text-center">Action</th>
    	</tr>

    	<?php $no=1; foreach ($kelas as $k ) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $k->nama_kelas ?></td>
    			<td><?php echo $k->kompetensi_keahlian ?></td>
    			<td>
    				<center>
    					<a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/dataKelas/updateData/'.$k->id_kelas) ?>"><i class="fas fa-edit"></i></a>
    					<a onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataKelas/deleteData/'.$k->id_kelas) ?>"><i class="fas fa-trash"></i></a>
    				</center>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </table>

</div>
