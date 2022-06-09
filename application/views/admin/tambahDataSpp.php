<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">
    		<form method="POST" action="<?php echo base_url('admin/dataSpp/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>Tahun Ajaran</label>
    				<input type="text" name="tahun_ajaran" class="form-control">
    				<?php echo form_error('tahun_ajaran','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Nominal</label>
    				<input type="text" name="nominal" class="form-control">
    				<?php echo form_error('nominal','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<button type="submit" class="btn btn-success ">Tambah</button>
    		</form>
    	</div>
    </div>

</div>
