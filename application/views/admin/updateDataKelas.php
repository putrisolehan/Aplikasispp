<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">

            <?php foreach ($kelas as $k) : ?>
        		<form method="POST" action="<?php echo base_url('admin/dataKelas/updateDataAksi') ?>">

        			<div class="form-group">
        				<label>Kelas</label>
                        <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $k->id_kelas ?>">
        				<input type="text" name="nama_kelas" class="form-control" value="<?php echo $k->nama_kelas ?>">
        				<?php echo form_error('nama_kelas','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<div class="form-group">
        				<label>Kompetensi Keahlian</label>
        				<input type="text" name="kompetensi_keahlian" class="form-control" value="<?php echo $k->kompetensi_keahlian ?>">
        				<?php echo form_error('kompetensi_keahlian','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<button type="submit" class="btn btn-warning ">Update</button>
        		</form>
                
            <?php endforeach; ?>

    	</div>
    </div>

</div>
