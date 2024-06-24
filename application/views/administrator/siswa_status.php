<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> SISWA
  </div>
  
  <div class="navbar-form navbar-search">
    <?php echo form_open('Siswa/search') ?>
    <input type="text" name="keyword" class="form-control" placeholder="Search" style="width: 25%"><br>
    <button type="submit" class="btn btn-primary">Cari</button>
    <?php echo form_close() ?><br>
  </div>

  <?php echo anchor('Siswa/tambah_siswa','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>  Tambah Siswa</button>') ?>

  <?php echo anchor('Siswa/form','<button class="btn btn-success mb-3"><i class="fas fa-plus fa-sm"></i>  Import Data</button>') ?>

  <a class="btn btn-danger mb-3" href=" <?php echo base_url('Siswa/print') ?>"> <i class="fa fa-print"></i> Print</a>

  <form action="<?= base_url('Siswa/status') ?>" method="get">
      <button class="btn btn-primary" name="status" value="Aktif" type="submit">Aktif</button>
      <button class="btn btn-primary" name="status" value="Non Aktif" type="submit">Non Aktif</button>
      <button class="btn btn-primary" name="status" value="Undur Diri" type="submit">Undur Diri</button>
      <button class="btn btn-primary" name="status" value="Drop Out" type="submit">Drop Out</button>
      <button class="btn btn-primary" name="status" value="Lulus" type="submit">Lulus</button>
  </form><br>
  <br>

  <?php echo $this->session->flashdata('pesan') ?>
  
  <table class="table table-striped table-hover table-bordered">
    <tr>
      <th>NO</th>
      <th>NAMA</th>
      <th>NIS</th>
      <th>STATUS</th>
      <th>KOTA</th>  
      <th colspan="3">AKSI</th>
    </tr>

    <?php 

    $no=1;
    
    foreach ($siswa as $ssw) : ?>

      <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $ssw['nama_siswa'] ?></td>
        <td><?php echo $ssw['nis'] ?></td>
        <td><?php echo $ssw['status'] ?></td>
        <td><?php echo $ssw['kota'] ?></td>
        <td width="20px"><?php echo anchor('Siswa/detail/'.$ssw['nis'],'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('Siswa/update/'.$ssw['nis'],'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('Siswa/delete/'.$ssw['nis'],'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
      </tr>

    <?php endforeach; ?>

  </table>
</div>