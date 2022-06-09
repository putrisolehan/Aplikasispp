<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">

            <?php foreach ($petugas as $p) : ?>
        		<form method="POST" action="<?php echo base_url('admin/dataPetugas/updateDataAksi') ?>">

        			<div class="form-group">
        				<label>Nama Petugas</label>
                        <input type="hidden" name="id_petugas" class="form-control" value="<?php echo $p->id_petugas ?>">
        				<input type="text" name="nama_petugas" class="form-control" value="<?php echo $p->nama_petugas ?>">
        				<?php echo form_error('nama_petugas','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<div class="form-group">
        				<label>Username</label>
        				<input type="text" name="username" class="form-control" value="<?php echo $p->username ?>">
        				<?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<div class="form-group">
        				<label>Password</label>
        				<input type="text" name="password" class="form-control" value="<?php echo $p->password ?>">
        				<?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
        			</div>

        			<div class="form-group">
        				<label>Status</label>
                        <select name="level" class="form-control" >
                            <option value="<?php echo $p->level ?>"><?php echo $p->level ?></option>
                            <option value="petugas">petugas</option>
							<option value="admin">admin</option>
						</select>
        				<?php echo form_error('level','<div class="text-small text-danger"></div>') ?>
        			</div>

                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select name="hak_akses" class="form-control" >
                            <option value="<?php echo $p->hak_akses ?>"><?php echo $p->hak_akses ?></option>
                            <option value="1">petugas</option>
                            <option value="2">admin</option>
                        </select>
                        <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
                    </div>

        			<button type="submit" class="btn btn-warning ">Update</button>
        		</form>
            <?php endforeach; ?>

    	</div>
    </div>

</div>
