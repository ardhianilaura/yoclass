<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> FORM INPUT SISWA
	</div>

	<?php echo form_open_multipart('Siswa/tambah_siswa_aksi') ?>

	<div class="form-group">
		<label>NAMA</label>
		<input type="text" name="nama_siswa" class="form-control" value="<?php echo set_value('nama_siswa'); ?>" size="50" placeholder="Masukkan Nama Siswa">
		<?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NIS</label>
		<input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" value="<?php echo set_value('nis'); ?>" size="6">
		<?php echo form_error('nis', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>KELAS</label>
		<select name="kelas" class="form-control">
				<option value="">-- Pilih Kelas --</option>
				<?php foreach($kelas as $kl) : ?>
				<option value="<?= $kl->kelas; ?>"><?= $kl->kelas; ?></option>
			<?php endforeach; ?>
			</select>
		<?php echo form_error('kelas', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>WALI KELAS</label>
		<select name="nama_guru" class="form-control">
				<option value="">-- Pilih Wali Kelas --</option>
				<?php foreach($nama_guru as $ng) : ?>
				<option value="<?= $ng->nama_guru; ?>"><?= $ng->nama_guru; ?></option>
			<?php endforeach; ?>
			</select>
		<?php echo form_error('nama_guru', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>STATUS</label>
		<select name="status" class="form-control">
			<option value="">-- Pilih Status --</option>
			<option>Aktif</option>
			<option>Non Aktif</option>
			<option>Undur Diri</option>
			<option>Drop Out</option>
			<option>Lulus</option>
		</select>
		<?php echo form_error('status', '<div class="text-danger small ml-3">','</div>') ?>
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
		<label>No Telepon</label>
		<input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo set_value('no_hp'); ?>">
		<?php echo form_error('no_hp', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>TEMPAT LAHIR</label>
		<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo set_value('tempat_lahir'); ?>">
		<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>TANGGAL LAHIR</label>
		<input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
		<?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">','</div>') ?>
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
		<label>NAMA AYAH</label>
		<input type="text" name="nama_ayah" class="form-control" placeholder="Masukkan Nama Ayah" value="<?php echo set_value('nama_ayah'); ?>">
		<?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>PEKERJAAN AYAH</label>
		<input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Masukkan Pekerjaan Ayah" value="<?php echo set_value('pekerjaan_ayah'); ?>">
		<?php echo form_error('pekerjaan_ayah', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NO TELEPON AYAH</label>
		<input type="text" name="no_telp_ayah" class="form-control" placeholder="Masukkan No Telepon Ayah" value="<?php echo set_value('no_telp_ayah'); ?>">
		<?php echo form_error('no_telp_ayah', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NAMA IBU</label>
		<input type="text" name="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu" value="<?php echo set_value('nama_ibu'); ?>">
		<?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>PEKERJAAN IBU</label>
		<input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Masukkan Pekerjaan Ibu" value="<?php echo set_value('pekerjaan_ibu'); ?>">
		<?php echo form_error('pekerjaan_ibu', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NO TELEPON IBU</label>
		<input type="text" name="no_telp_ibu" class="form-control" placeholder="Masukkan No Telepon Ibu" value="<?php echo set_value('no_telp_ibu'); ?>">
		<?php echo form_error('no_telp_ibu', '<div class="text-danger small ml-3">','</div>') ?>
	</div>

	<div class="form-group">
		<label>NAMA WALI</label>
		<input type="text" name="nama_wali" class="form-control" placeholder="Masukkan Nama Wali" value="<?php echo set_value('nama_wali'); ?>">
	</div>

	<div class="form-group">
		<label>NO TELEPON WALI</label>
		<input type="text" name="no_telp_wali" class="form-control" placeholder="Masukkan No Telepon Wali" value="<?php echo set_value('no_telp_wali'); ?>">
	</div>

	<div class="form-group">
		<label>PEKERJAAN WALI</label>
		<input type="text" name="pekerjaan_wali" class="form-control" placeholder="Masukkan Pekerjaan Wali" value="<?php echo set_value('pekerjaan_wali'); ?>">
	</div>

	<div class="form-group">
		<label>Foto</label><br>
		<input type="file" name="poto">
	</div>



	<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	<button type="reset" class="btn btn-warning mb-5">Batal</button>

	<?php form_close(); ?>

</div>