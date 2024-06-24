<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> GURU
  </div>

  <div class="navbar-form navbar-search">
    <?php echo form_open('Guru/search') ?>
    <input type="text" name="keyword" class="form-control" placeholder="Search" style="width: 25%"><br>
    <button type="submit" class="btn btn-primary">Cari</button>
    <?php echo form_close() ?><br>
  </div>

  <?php echo anchor('Guru/tambah_guru','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>  Tambah Guru</button>') ?>

  <?php echo anchor('Guru/form','<button class="btn btn-success mb-3"><i class="fas fa-plus fa-sm"></i>  Import Data</button>') ?>

  <a class="btn btn-danger mb-3" href=" <?php echo base_url('Guru/print') ?>"> <i class="fa fa-print"></i> Print</a>


  <?php echo $this->session->flashdata('pesan') ?>
  
  <table class="table table-striped table-hover table-bordered">
    <tr>
      <th>NO</th>
      <th>NAMA</th>
      <th>NIK</th>
      <th>STATUS</th>
      <th>KOTA</th>  
      <th colspan="3">AKSI</th>
    </tr>

    <?php 

    $no=1;
    foreach ($guru as $gr) : ?>

      <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $gr->nama_guru ?></td>
        <td><?php echo $gr->nik ?></td>
        <td><?php echo $gr->status ?></td>
        <td><?php echo $gr->kota ?></td>
        <td width="20px"><?php echo anchor('Guru/detail/'.$gr->nik,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('Guru/update/'.$gr->nik,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
        <td width="20px"><?php echo anchor('Guru/delete/'.$gr->nik,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
      </tr>

    <?php endforeach; ?>

  </table>
</div>