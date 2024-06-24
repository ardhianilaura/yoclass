<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM UPDATE IDENTITAS
  </div>

  <?php foreach($identitas as $idt) : ?>

  	<form method="post" action="<?php echo base_url('Identitas/update_aksi') ?>">

  		<div class="form-group">
  			<label>NAMA WEBSITE</label>
  			<input type="hidden" name="identitas_id" value="<?php echo $idt->identitas_id ?>">
  			<input type="text" name="nama_website" class="form-control" value="<?php echo $idt->nama_website?>" readonly>
        <?php echo form_error('nama_website', '<div class="text-danger small ml-3">','</div>') ?>
  		</div>

  		<div class="form-group">
  			<label>ALAMAT</label>
  			<input type="text" name="alamat" class="form-control" value="<?php echo $idt->alamat ?>">
        <?php echo form_error('alamat', '<div class="text-danger small ml-3">','</div>') ?>
  		</div>
      <div class="form-group">
        <label>EMAIL</label>
        <input type="text" name="email" class="form-control" value="<?php echo $idt->email ?>">
        <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
      </div>
      <div class="form-group">
        <label>NO TELEPON</label>
        <input type="text" name="telp" class="form-control" value="<?php echo $idt->telp ?>">
        <?php echo form_error('telp', '<div class="text-danger small ml-3">','</div>') ?>
      </div>

  		<button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>

  	</form>

    <?php  endforeach; ?> 
</div>