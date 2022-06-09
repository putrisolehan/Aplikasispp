<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 70px">
    	<div class="card-body">
    		<form method="POST" action="<?php echo base_url('admin/transaksi/tambahDataAksi') ?>">

    			<div class="form-group">
                    <label>NISN</label>
                    <select name="nisn" class="form-control">
                        <option value="">--Pilih NISN--</option>
                        <?php foreach ($siswa as $s ): ?>
                             <option value="<?php echo $s->nisn ?>"><?php echo $s->nisn ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nisn','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                <label>Nama Petugas</label>
                <select name="nama_petugas" class="form-control">
                    <option value="">--Pilih Petugas--</option>
                    <?php foreach ($petugas as $p ): ?>
                         <option value="<?php echo $p->nama_petugas ?>"><?php echo $p->nama_petugas ?></option>
                    <?php endforeach; ?>
                </select>
                    <?php echo form_error('nama_petugas','<div class="text-small text-danger"></div>') ?>
                </div>

    			<div class="form-group">
    				<label>Tanggal Bayar</label>
    				<input type="date" name="tgl_bayar" class="form-control">
    				<?php echo form_error('tgl_bayar','<div class="text-small text-danger"></div>') ?>
    			</div>

                <div class="form-group">
                    <label>Bulan dan Tahun Bayar</label>
                    <input type="text" name="bulan" class="form-control" placeholder="Masukkan bulan dan tahun bayar dengan angka dan tanpa spasi">
                    <?php echo form_error('bulan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Bulan yang dibayar</label>
                    <select name="bulan_dibayar" class="form-control">
                            <option value="">--Pilih Bulan Bayar--</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                    </select>
                    <?php echo form_error('bulan_dibayar','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tahun yang dibayar</label>
                    <input type="text" name="tahun_dibayar" class="form-control">
                    <?php echo form_error('tahun_dibayar','<div class="text-small text-danger"></div>') ?>
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

               <div class="form-group">
                    <label>Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" class="form-control">
                    <?php echo form_error('jumlah_bayar','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan" class="form-control">
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                    <?php echo form_error('keterangan','<div class="text-small text-danger"></div>') ?>
                </div>

    			<button type="submit" class="btn btn-success ">Tambah</button>
    		</form>
    	</div>
    </div>

</div>
