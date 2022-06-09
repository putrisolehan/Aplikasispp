<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-2" href="<?php echo base_url('admin/dataPetugas/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
    	<tr>
    		<th class="text-center">No</th>
    		<th class="text-center">Nama Petugas</th>
    		<th class="text-center">Username</th>
    		<th class="text-center">Password</th>
    		<th class="text-center">Status</th>
            <th class="text-center">Hak Akses</th>
    		<th class="text-center">Action</th>
    	</tr>

    	<?php $no=1; foreach ($petugas as $p ) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $p->nama_petugas ?></td>
    			<td><?php echo $p->username ?></td>
    			<td><?php echo $p->password ?></td>
    			<td><?php echo $p->level ?></td>
                <td><?php echo $p->hak_akses ?></td>
    			<td>
    				<center>
    					<a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/dataPetugas/updateData/'.$p->id_petugas) ?>"><i class="fas fa-edit"></i></a>
    					<a onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPetugas/deleteData/'.$p->id_petugas) ?>"><i class="fas fa-trash"></i></a>
    				</center>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </table>

</div>
