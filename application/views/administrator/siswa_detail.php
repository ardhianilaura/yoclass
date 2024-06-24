 <div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fa fa-eye"></i> DETAIL SISWA
  </div>

  <table class="table table-hover table-bordered table-striped">
    <?php foreach($detail as $dt) : ?>


      <center><img class="mb-3" src="<?php echo base_url('assets/uploads/').$dt->poto ?>" style="width: 25%"></center>

      <tr>
        <td>NAMA</td>
        <td><?php echo $dt->nama_siswa; ?></td>
      </tr>

      <tr>
        <td>NIS</td>
        <td><?php echo $dt->nis; ?></td>
      </tr>

      <tr>
        <td>KELAS</td>
        <td><?php echo $dt->kelas; ?></td>
      </tr>

      <tr>
        <td>WALI KELAS</td>
        <td><?php echo $dt->nama_guru; ?></td>
      </tr>

      <tr>
        <td>STATUS</td>
        <td><?php echo $dt->status; ?></td>
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
        <td>NO HANDPHONE</td>
        <td><?php echo $dt->no_hp; ?></td>
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
        <td>NAMA AYAH</td>
        <td><?php echo $dt->nama_ayah; ?></td>
      </tr>

      <tr>
        <td>PEKERJAAN AYAH</td>
        <td><?php echo $dt->pekerjaan_ayah; ?></td>
      </tr>

      <tr>
        <td>NO TELEPON AYAH</td>
        <td><?php echo $dt->no_telp_ayah; ?></td>
      </tr>

      <tr>
        <td>NAMA IBU</td>
        <td><?php echo $dt->nama_ibu; ?></td>
      </tr>

      <tr>
        <td>PEKERJAAN IBU</td>
        <td><?php echo $dt->pekerjaan_ibu; ?></td>
      </tr>

      <tr>
        <td>NO TELEPON IBU</td>
        <td><?php echo $dt->no_telp_ibu; ?></td>
      </tr>

      <tr>
        <td>NAMA WALI</td>
        <td><?php echo $dt->nama_wali; ?></td>
      </tr>

      <tr>
        <td>NO TELEPON WALI</td>
        <td><?php echo $dt->no_telp_wali; ?></td>
      </tr>

      <tr>
        <td>PEKERJAAN WALI</td>
        <td><?php echo $dt->pekerjaan_wali; ?></td>
      </tr>

    <?php endforeach; ?>
    
  </table>

  <?php echo anchor('siswa','<div class="btn btn-sm btn-primary">Kembali</div>')?>

</div>