<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> FORM UPDATE SISWA
  </div>

  <?php foreach($siswa as $sw) : ?>

  <?php echo form_open_multipart('Siswa/update_siswa_aksi') ?>

  <div class="form-group">
    <label>NAMA</label>
    <input type="text" name="nama_siswa" class="form-control" value="<?php echo $sw->nama_siswa ?>">
    <?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NIS</label>
    <input type="text" name="nis" class="form-control" value="<?php echo $sw->nis ?>" readonly>
    <input type="text" name="orang_tua_id" class="form-control" value="<?php echo $sw->orang_tua_id ?>" hidden>
    <?php echo form_error('nis', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>KELAS</label>
    <input type="text" name="kelas" class="form-control" value="<?php echo $sw->kelas ?>">
    <?php echo form_error('kelas', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>WALI KELAS</label>
    <input type="text" name="nama_guru" class="form-control" value="<?php echo $sw->nama_guru ?>">
    <?php echo form_error('nama_guru', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>STATUS</label>
    <select name="status" class="form-control">
      <option value="Aktif" <?php if($sw->status=="Aktif"){echo "selected";} ?>>Aktif</option>
      <option value="Non Aktif" <?php if($sw->status=="Non Aktif"){echo "selected";} ?>>Non Aktif</option>
      <option value="Undur Diri" <?php if($sw->status=="Undur Diri"){echo "selected";} ?>>Undur Diri</option>
      <option value="Drop Out" <?php if($sw->status=="Drop Out"){echo "selected";} ?>>Drop Out</option>
      <option value="Lulus" <?php if($sw->status=="Lulus"){echo "selected";} ?>>Lulus</option>
    </select>
    <?php echo form_error('status', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>JALAN</label>
    <input type="text" name="jalan" class="form-control" value="<?php echo $sw->jalan ?>">
    <?php echo form_error('jalan', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>KECAMATAN</label>
    <input type="text" name="kecamatan" class="form-control" value="<?php echo $sw->kecamatan ?>">
    <?php echo form_error('kecamatan', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>KOTA</label>
    <input type="text" name="kota" class="form-control" value="<?php echo $sw->kota ?>">
    <?php echo form_error('kota', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>PROVINSI</label>
    <input type="text" name="provinsi" class="form-control" value="<?php echo $sw->provinsi ?>">
    <?php echo form_error('provinsi', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NO HANDPHONE</label>
    <input type="text" name="no_hp" class="form-control" value="<?php echo $sw->no_hp ?>">
    <?php echo form_error('no_hp', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>TEMPAT LAHIR</label>
    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $sw->tempat_lahir ?>">
    <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>TANGGAL LAHIR</label>
    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $sw->tanggal_lahir ?>">
    <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>JENIS KELAMIN</label>
    <select name="jenis_kelamin" class="form-control" >
      <option value="Laki-Laki" <?php if($sw->jenis_kelamin=="Laki-Laki"){echo "selected";} ?>>Laki-Laki</option>
      <option value="Perempuan" <?php if($sw->jenis_kelamin=="Perempuan"){echo "selected";} ?>>Perempuan</option>
    </select>
    <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>AGAMA</label>
    <select name="agama" class="form-control">
      <option value="Islam" <?php if($sw->agama=="Islam"){echo "selected";} ?>>Islam</option>
      <option value="Kristen" <?php if($sw->agama=="Kristen"){echo "selected";} ?>>Kristen</option>
      <option value="Katolik" <?php if($sw->agama=="Katolik"){echo "selected";} ?>>Katolik</option>
      <option value="Hindu" <?php if($sw->agama=="Hindu"){echo "selected";} ?>>Hindu</option>
      <option value="Buddha" <?php if($sw->agama=="Buddha"){echo "selected";} ?>>Buddha</option>
      <option value="Konghucu" <?php if($sw->agama=="Konghucu"){echo "selected";} ?>>Konghucu</option>
    </select>
    <?php echo form_error('agama','<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NAMA AYAH</label>
    <input type="text" name="nama_ayah" class="form-control" value="<?php echo $sw->nama_ayah ?>">
    <?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>PEKERJAAN AYAH</label>
    <input type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $sw->pekerjaan_ayah ?>">
    <?php echo form_error('pekerjaan_ayah', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NO TELEPON AYAH</label>
    <input type="text" name="no_telp_ayah" class="form-control" value="<?php echo $sw->no_telp_ayah ?>">
    <?php echo form_error('no_telp_ayah', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NAMA IBU</label>
    <input type="text" name="nama_ibu" class="form-control" value="<?php echo $sw->nama_ibu ?>">
    <?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>PEKERJAAN IBU</label>
    <input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $sw->pekerjaan_ibu ?>">
    <?php echo form_error('pekerjaan_ibu', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NO TELEPON IBU</label>
    <input type="text" name="no_telp_ibu" class="form-control" value="<?php echo $sw->no_telp_ibu ?>">
    <?php echo form_error('no_telp_ibu', '<div class="text-danger small ml-3">','</div>') ?>
  </div>

  <div class="form-group">
    <label>NAMA WALI</label>
    <input type="text" name="nama_wali" class="form-control" value="<?php echo $sw->nama_wali ?>">
  </div>

  <div class="form-group">
    <label>NO TELEPON WALI</label>
    <input type="text" name="no_telp_wali" class="form-control" value="<?php echo $sw->no_telp_wali ?>">
  </div>

  <div class="form-group">
    <label>PEKERJAAN WALI</label>
    <input type="text" name="pekerjaan_wali" class="form-control" value="<?php echo $sw->pekerjaan_wali?>">
  </div>

  <div class="form-group">
    <?php foreach($detail as $dt) : ?>
      <img src="<?php echo base_url(). 'assets/uploads/'.$sw->poto ?>" style="width: 25%">
      <?php endforeach; ?><br><br>
    <label>FOTO</label><br>
    <input type="file" name="userfile" value="<?php echo $sw->poto ?>">
  </div>

  <button type="submit" class="btn btn-primary mb-5">Simpan</button>
  <button type="reset" class="btn btn-warning mb-5">Batal</button>

  <?php form_close(); ?>

<?php endforeach; ?>

</div>