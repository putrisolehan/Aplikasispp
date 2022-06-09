<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-2" href="<?php echo base_url('admin/dataSpp/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
    	<tr>
    		<th class="text-center">No</th>
    		<th class="text-center">Tahun Ajaran</th>
    		<th class="text-center">Nominal</th>
    		<th class="text-center">Action</th>
    	</tr>

    	<?php $no=1; foreach ($spp as $s ) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $s->tahun_ajaran ?></td>
    			<td>Rp.<?php echo number_format($s->nominal,0,',','.') ?></td>
    			<td>
    				<center>
    					<a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/dataSpp/updateData/'.$s->id_spp) ?>"><i class="fas fa-edit"></i></a>
    					<a onclick="return confirm('Apakah anda ingin menghapus data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSpp/deleteData/'.$s->id_spp) ?>"><i class="fas fa-trash"></i></a>
    				</center>
    			</td>
    		</tr>
    	<?php endforeach; ?>
    </table>

</div>
