<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> FORM MASUK CETAK RAPORT
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<form method="post" action="<?php echo base_url('Cetak_raport/cetak_aksi') ?>">

		<div class="form-group">
			<label>NIS</label>
			<input type="text" name="nis" placeholder="Masukkan NIS Siswa" class="form-control">	
			<?php echo form_error('nis','<div class="text-danger small ml-2">','</div>') ?>
		</div>

		<div class="form-group">
			<label>NAMA</label>
			<input type="text" name="nama_siswa" placeholder="Masukkan Nama Siswa" class="form-control">
			<?php echo form_error('nama_siswa','<div class="text-danger small ml-2">','</div>') ?>
		</div>
		
		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>