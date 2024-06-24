<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM UPDATE MATA PELAJARAN
  </div>

  <?php foreach($mata_pelajaran as $mp) : ?>

      <?php echo form_open_multipart('Mata_pelajaran/update_aksi') ?>

  		<div class="form-group">
  			<label>Kode Mata Pelajaran</label>
  			<input type="text" name="kode_mapel" class="form-control" value="<?php echo $mp->kode_mapel ?>">
        <?php echo form_error('kode_mapel', '<div class="text-danger small ml-3">','</div>') ?>
  		</div>

  		<div class="form-group">
  			<label>Mata Pelajaran</label>
  			<input type="text" name="mapel" class="form-control" value="<?php echo $mp->mapel ?>">
        <?php echo form_error('mapel', '<div class="text-danger small ml-3">','</div>') ?>
  		</div>

      <div class="form-group">
        <label>Jam Pertemuan</label>
        <input type="text" name="jp" class="form-control" value="<?php echo $mp->jp ?>">
        <?php echo form_error('jp', '<div class="text-danger small ml-3">','</div>') ?>
      </div>

  		<button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>

      <?php form_close(); ?>

    <?php  endforeach; ?> 
</div>