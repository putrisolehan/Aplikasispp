<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">
    		<form method="POST" action="<?php echo base_url('admin/dataPetugas/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>Nama Petugas</label>
    				<input type="text" name="nama_petugas" class="form-control">
    				<?php echo form_error('nama_petugas','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Username</label>
    				<input type="text" name="username" class="form-control">
    				<?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Password</label>
    				<input type="password" name="password" class="form-control">
    				<?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Status</label>
    				<select name="level" class="form-control">
							<option value="">--Pilih Status--</option>
                            <option value="petugas">petugas</option>
							<option value="admin">admin</option>
						</select>
    				<?php echo form_error('level','<div class="text-small text-danger"></div>') ?>
    			</div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                            <option value="">--Pilih Hak Akses--</option>
                            <option value="1">petugas</option>
                            <option value="2">admin</option>
                        </select>
                    <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
                </div>

    			<button type="submit" class="btn btn-success ">Tambah</button>
    		</form>
    	</div>
    </div>

</div>
