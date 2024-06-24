<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM INPUT MATA PELAJARAN
  </div>
	
	<form method="post" action="<?php echo base_url('Mata_pelajaran/input_aksi') ?>">
		<div class="form-group">
			<label>Kode Mata Pelajaran</label>
			<input type="text" name="kode_mapel" placeholder="Masukkan Kode Mata Pelajaran" class="form-control">
			<?php echo form_error('kode_mapel', '<div class="text-danger small" ml-3>'); ?>
		</div>
		<div class="form-group">
			<label>Mata Pelajaran</label>
			<input type="text" name="mapel" placeholder="Masukkan Mata Pelajaran" class="form-control">
			<?php echo form_error('mapel', '<div class="text-danger small" ml-3>'); ?>
		</div>
		<div class="form-group">
			<label>Jam Pertemuan</label>
			<input type="text" name="jp" placeholder="Masukkan Jam Pertemuan" class="form-control">
			<?php echo form_error('jp', '<div class="text-danger small" ml-3>'); ?>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button type="reset" class="btn btn-warning">Batal</button>
	</form>
</div>