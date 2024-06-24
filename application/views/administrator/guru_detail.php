<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-eye"></i> DETAIL GURU
  </div>

  <table class="table table-hover table-bordered table-striped">
    <?php foreach($detail as $dt) : ?>

      <center><img class="mb-3" src="<?php echo base_url('assets/uploads/').$dt->poto ?>" style="width: 25%"></center>

      <tr>
        <td>NAMA</td>
        <td><?php echo $dt->nama_guru; ?></td>
      </tr>

      <tr>
        <td>NIK</td>
        <td><?php echo $dt->nik; ?></td>
      </tr>

      <tr>
        <td>JALAN</td>
        <td><?php echo $dt->jalan; ?></td>
      </tr>

      <tr>
        <td>KECAMATAN</td>
        <td><?php echo $dt->kecamatan; ?></td>
      </tr>

      <tr>
        <td>KOTA</td>
        <td><?php echo $dt->kota; ?></td>
      </tr>

      <tr>
        <td>PROVINSI</td>
        <td><?php echo $dt->provinsi; ?></td>
      </tr>

      <tr>
        <td>TEMPAT LAHIR</td>
        <td><?php echo $dt->tempat_lahir; ?></td>
      </tr>

      <tr>
        <td>TANGGAL LAHIR</td>
        <td><?php echo $dt->tanggal_lahir; ?></td>
      </tr>

      <tr>
        <td>JENIS KELAMIN</td>
        <td><?php echo $dt->jenis_kelamin; ?></td>
      </tr>

      <tr>
        <td>AGAMA</td>
        <td><?php echo $dt->agama; ?></td>
      </tr>

      <tr>
        <td>NO HANDPHONE</td>
        <td><?php echo $dt->no_hp; ?></td>
      </tr>

      <tr>
        <td>STATUS</td>
        <td><?php echo $dt->status; ?></td>
      </tr>

    <?php endforeach; ?>
    
  </table>

  <?php echo anchor('Guru','<div class="btn btn-sm btn-primary">Kembali</div>')?>

</div>