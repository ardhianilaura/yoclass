<div class="container-fluid">
  <div class="alert alert-success" role="alert">
  <i class="fas fa-tachometer-alt"></i> Dashboard
</div>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang <strong><?php echo $nama_lengkap; ?></strong> di Aplikasi Penilaian Siswa SMA Negeri 1 Girimarto, Anda Login sebagai <strong><?php echo $level; ?></strong></h4>
  <hr>
  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cogs"></i> Control Panel</button>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i>  Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Siswa") ?>"><p class="nav-link small text-info">SISWA</p></a>
          </div>
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Guru") ?>"><p class="nav-link small text-info">GURU</p></a>
          </div>
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Kelas") ?>"><p class="nav-link small text-info">KELAS</p></a>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Mata_pelajaran") ?>"><p class="nav-link small text-info">MATA PELAJARAN</p></a>
          </div>
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Identitas") ?>"><p class="nav-link small text-info">IDENTITAS</p></a>
          </div>
          <div class="col-md-3 text-info text-center">
            <i class="fas fa-3x fa-user-graduate"></i>
            <a href="<?php echo base_url("Tentang_sekolah") ?>"><p class="nav-link small text-info">TENTANG SEKOLAH</p></a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>