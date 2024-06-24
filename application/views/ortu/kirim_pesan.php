<form method="post" action="<?php echo base_url('Pesan2/kirim_pesan') ?>">
  <div class="row">
    <div class="col-md-8 ml-5">
      <div class="alert alert-primary text text-center">
      <i class="fas fa-envelope-open-text"></i> HUBUNGI GURU
      </div>

      <?php echo $this->session->flashdata('pesan') ?>

      <div class="form-group">
        <label>NAMA</label>
        <input type="text" name="nama" class="form-control">
          <?php echo form_error('nama','<div class="text-danger small">','</div>') ?>
      </div>

      <div class="form-group">
        <label>EMAIL</label>
        <input type="text" name="email" class="form-control">
          <?php echo form_error('email','<div class="text-danger small">','</div>') ?>
        </div>

      <div class="form-group">
        <label>PESAN</label>
        <input type="text" name="pesan" class="form-control">
          <?php echo form_error('pesan','<div class="text-danger small">','</div>') ?>
        </div>

      <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
  </div>
</form>