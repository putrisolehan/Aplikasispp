<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">
    		<form method="POST" action="<?php echo base_url('admin/dataKelas/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>Kelas</label>
    				<input type="text" name="nama_kelas" class="form-control">
    				<?php echo form_error('nama_kelas','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Kompetensi Keahlian</label>
    				<input type="text" name="kompetensi_keahlian" class="form-control">
    				<?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<button type="submit" class="btn btn-success ">Tambah</button>
    		</form>
    	</div>
    </div>

</div>
