<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">

            <?php foreach ($spp as $s) : ?>
        		<form method="POST" action="<?php echo base_url('admin/dataSpp/updateDataAksi') ?>">

        			<div class="form-group">
        				<label>Tahun Ajaran</label>
                        <input type="hidden" name="id_spp" class="form-control" value="<?php echo $s->id_spp ?>">
        				<input type="text" name="tahun_ajaran" class="form-control" value="<?php echo $s->tahun_ajaran ?>">
        				<?php echo form_error('tahun_ajaran','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<div class="form-group">
        				<label>Nominal</label>
        				<input type="text" name="nominal" class="form-control" value="<?php echo $s->nominal ?>">
        				<?php echo form_error('nominal','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<button type="submit" class="btn btn-warning ">Update</button>
        		</form>
            <?php endforeach; ?>

    	</div>
    </div>

</div>
