<div class="container-fluid">

  <div class="alert alert-success" role="alert">
    <i class="fas fa-user-graduate"></i> DATA SISWA
  </div>
  
  <table class="table table-striped table-hover table-bordered">
    <tr>
      <th>NO</th>
      <th>NAMA</th>
      <th>NIS</th>
      <th>STATUS</th>
      <th>KOTA</th>  
      <th colspan="1">AKSI</th>
    </tr>

    <?php 

    $no=1;
    foreach ($data_siswa as $ssw) : ?>

      <tr>
        <td width="20px"><?php echo $no++ ?></td>
        <td><?php echo $ssw->nama_siswa ?></td>
        <td><?php echo $ssw->nis ?></td>
        <td><?php echo $ssw->status ?></td>
        <td><?php echo $ssw->kota ?></td>
        <td width="20px"><?php echo anchor('Home2/detail/'.$ssw->nis,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
      </tr>

    <?php endforeach; ?>

  </table>
</div>