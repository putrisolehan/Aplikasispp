<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">
    		<form method="POST" action="<?php echo base_url('admin/dataSiswa/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>NISN</label>
    				<input type="text" name="nisn" class="form-control">
    				<?php echo form_error('nisn','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>NIS</label>
    				<input type="text" name="nis" class="form-control">
    				<?php echo form_error('nis','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Nama Siswa</label>
    				<input type="text" name="nama" class="form-control">
    				<?php echo form_error('nama','<div class="text-small text-danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Kelas</label>
    				<select name="nama_kelas" class="form-control">
							<option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $k ): ?>
							     <option value="<?php echo $k->nama_kelas ?>"><?php echo $k->nama_kelas ?></option>
                            <?php endforeach; ?>
						</select>
    				<?php echo form_error('nama_kelas','<div class="text-small text-danger"></div>') ?>
    			</div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                    <?php echo form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="no_telp" class="form-control">
                    <?php echo form_error('no_telp','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="tahun_ajaran" class="form-control">
                            <option value="">--Pilih Tahun Ajaran--</option>
                            <?php foreach ($spp as $s ): ?>
                                 <option value="<?php echo $s->tahun_ajaran ?>"><?php echo $s->tahun_ajaran ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php echo form_error('tahun_ajaran','<div class="text-small text-danger"></div>') ?>
                </div>

    			<button type="submit" class="btn btn-success ">Tambah</button>
    		</form>
    	</div>
    </div>

</div>
