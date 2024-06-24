<div class="container-fluid">

	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM INPUT KELAS
  </div>
	
	<form method="post" action="<?php echo base_url('Kelas/input_aksi') ?>">
		<div class="form-group">
			<label>Kode Kelas</label>
			<input type="text" name="kode_kelas" placeholder="Masukkan Kode Kelas" class="form-control">
			<?php echo form_error('kode_kelas', '<div class="text-danger small" ml-3>'); ?>
		</div>
		<div class="form-group">
			<label>Kelas</label>
			<input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control">
			<?php echo form_error('kelas', '<div class="text-danger small" ml-3>'); ?>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<button type="reset" class="btn btn-warning">Batal</button>
	</form>
</div>