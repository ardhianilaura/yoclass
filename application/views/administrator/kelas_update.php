<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM UPDATE KELAS
  </div>

  <?php foreach($kelas as $kl) : ?>

  	<form method="post" action="<?php echo base_url('Kelas/update_aksi') ?>">
      <div class="form-group">
        <label>Kode Kelas</label>
        <input type="text" name="kode_kelas" class="form-control" value="<?php echo $kl->kode_kelas ?>">
      </div>

  		<div class="form-group">
  			<label>Kelas</label>
  			<input type="text" name="kelas" class="form-control" value="<?php echo $kl->kelas ?>">
  		</div>

  		<button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>

  	</form>

    <?php  endforeach; ?> 
</div>