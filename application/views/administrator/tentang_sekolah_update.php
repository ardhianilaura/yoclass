<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM UPDATE TENTANG SEKOLAH
  </div>

  <?php foreach($tentang_sekolah as $ttg) : ?>

  	<form method="post" action="<?php echo base_url('Tentang_sekolah/update_aksi') ?>">

  		<div class="form-group">
  			<label>Profil</label>
  			<input type="hidden" name="tentang_kampus_id" value="<?php echo $ttg->tentang_sekolah_id ?>">
  			<input type="text" name="profil" class="form-control" value="<?php echo $ttg->profil?>">
  		</div>

  		<div class="form-group">
  			<label>Visi</label>
  			<input type="text" name="visi" class="form-control" value="<?php echo $ttg->visi ?>">
  		</div>
      <div class="form-group">
        <label>Misi</label>
        <input type="text" name="visi" class="form-control" value="<?php echo $ttg->misi ?>">
      </div>

  		<button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>

  	</form>

    <?php  endforeach; ?> 
</div>