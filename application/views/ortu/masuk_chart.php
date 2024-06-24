<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> FORM MASUK LIHAT HASIL BELAJAR SISWA
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<form method="post" action="<?php echo base_url('Grafik/cetak_aksi') ?>">

		<div class="form-group">
			<label>NIS</label>
			<input type="text" name="nis" placeholder="Masukkan NIS" class="form-control">
			<?php echo form_error('nis','<div class="text-danger small ml-2">','</div>') ?>
		</div>
		
		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>