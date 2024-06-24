<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> FORM INPUT GURU
	</div>
 
	<?php echo form_open_multipart('Guru/tambah_guru_aksi') ?>
	<div class="form-group">
		<label>NAMA</label>
		<input type="text" name="nama_guru" class="form-control" placeholder="Masukkan Nama Guru" value="<?php echo set_value('nama_guru'); ?>">
		<?php echo form_error('nama_guru', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NIK</label>
		<input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" value="<?php echo set_value('nik'); ?>">
		<?php echo form_error('nik', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>JALAN</label>
		<input type="text" name="jalan" class="form-control" placeholder="Masukkan Jalan" value="<?php echo set_value('jalan'); ?>">
		<?php echo form_error('jalan', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>KECAMATAN</label>
		<input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" value="<?php echo set_value('kecamatan'); ?>">
		<?php echo form_error('kecamatan', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>KOTA</label>
		<input type="text" name="kota" class="form-control" placeholder="Masukkan Kota" value="<?php echo set_value('kota'); ?>">
		<?php echo form_error('kota', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>PROVINSI</label>
		<input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" value="<?php echo set_value('provinsi'); ?>">
		<?php echo form_error('provinsi', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>TEMPAT LAHIR</label>
		<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo set_value('tempat_lahir'); ?>">
		<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>TANGGAL LAHIR</label>
		<input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
		<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>JENIS KELAMIN</label>
		<select name="jenis_kelamin" class="form-control">
			<option value="">-- Pilih Jenis Kelamin --</option>
			<option>Laki-Laki</option>
			<option>Perempuan</option>
		</select>
		<?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>AGAMA</label>
		<select name="agama" class="form-control">
			<option value="">-- Pilih Agama --</option>
			<option>Islam</option>
			<option>Kristen</option>
			<option>Katolik</option>
			<option>Hindu</option>
			<option>Buddha</option>
			<option>Konghucu</option>
		</select>
		<?php echo form_error('agama','<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NO HANDPHONE</label>
		<input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Handphone" value="<?php echo set_value('no_hp'); ?>">
		<?php echo form_error('no_hp', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>STATUS</label>
		<select name="status" class="form-control">
			<option value="">-- Pilih Status --</option>
			<option>Honorer</option>
			<option>PNS</option>
		</select>
		<?php echo form_error('status', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>FOTO</label><br>
		<input type="file" name="poto">
	</div>


	<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	<button type="reset" class="btn btn-warning mb-5">Batal</button>

<?php form_close(); ?>

</div>