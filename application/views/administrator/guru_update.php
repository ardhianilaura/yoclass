<div class="container-fluid">
  
  <div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> FORM UPDATE GURU
  </div>

  <?php foreach($guru as $gr) : ?>

    <?php echo form_open_multipart('Guru/update_guru_aksi') ?>

  <div class="form-group">
    <label>NAMA</label>
    <input type="text" name="nama_guru" class="form-control" value="<?php echo $gr->nama_guru ?>">
    <?php echo form_error('nama_guru', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NIK</label>
    <input type="text" name="nik" class="form-control" value="<?php echo $gr->nik ?>" readonly> 
    <?php echo form_error('nik', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>JALAN</label>
    <input type="text" name="jalan" class="form-control" value="<?php echo $gr->jalan ?>">
    <?php echo form_error('jalan', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>KECAMATAN</label>
    <input type="text" name="kecamatan" class="form-control" value="<?php echo $gr->kecamatan ?>">
    <?php echo form_error('kecamatan', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>KOTA</label>
    <input type="text" name="kota" class="form-control" value="<?php echo $gr->kota ?>">
    <?php echo form_error('kota', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>PROVINSI</label>
    <input type="text" name="provinsi" class="form-control" value="<?php echo $gr->provinsi ?>">
    <?php echo form_error('provinsi', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>TEMPAT LAHIR</label>
    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $gr->tempat_lahir ?>">
    <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>TANGGAL LAHIR</label>
    <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $gr->tanggal_lahir ?>">
    <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>JENIS KELAMIN</label>
    <select name="jenis_kelamin" class="form-control" >
      <option value="Laki-Laki" <?php if($gr->jenis_kelamin=="Laki-Laki"){echo "selected";} ?>>Laki-Laki</option>
      <option value="Perempuan" <?php if($gr->jenis_kelamin=="Perempuan"){echo "selected";} ?>>Perempuan</option>
    </select>
    <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>AGAMA</label>
    <select name="agama" class="form-control">
      <option value="Islam" <?php if($gr->agama=="Islam"){echo "selected";} ?>>Islam</option>
      <option value="Kristen" <?php if($gr->agama=="Kristen"){echo "selected";} ?>>Kristen</option>
      <option value="Katolik" <?php if($gr->agama=="Katolik"){echo "selected";} ?>>Katolik</option>
      <option value="Hindu" <?php if($gr->agama=="Hindu"){echo "selected";} ?>>Hindu</option>
      <option value="Buddha" <?php if($gr->agama=="Buddha"){echo "selected";} ?>>Buddha</option>
      <option value="Konghucu" <?php if($gr->agama=="Konghucu"){echo "selected";} ?>>Konghucu</option>
    </select>
    <?php echo form_error('agama','<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NO HANDPHONE</label>
    <input type="text" name="no_hp" class="form-control" value="<?php echo $gr->no_hp ?>">
    <?php echo form_error('no_hp', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>STATUS</label>
    <select name="status" class="form-control">
      <option value="Honorer" <?php if($gr->status=="Honorer"){echo "selected";} ?>>Honorer</option>
      <option value="PNS" <?php if($gr->status=="PNS"){echo "selected";} ?>>PNS</option>
    </select>
    <?php echo form_error('status', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>FOTO</label><br>
    <input type="file" name="userfile" value="<?php echo $gr->poto ?>">
  </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>

    <?php form_close(); ?>

    <?php  endforeach; ?> 
</div>