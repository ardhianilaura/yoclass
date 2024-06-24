<nav class="navbar navbar-light bg-warning text-dark">

<?php foreach($identitas as $idt) : ?>
  <a class="navbar-brand"><strong font size="5"><?php echo $idt->nama_website ?></strong></a>
  <a class="navbar-brand"><font size="3" color="#ffffff"><?php echo $idt->alamat ?></a></font>
<?php endforeach; ?>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Login
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url("Auth") ?>">Admin</a>
    <a class="dropdown-item" href="<?php echo base_url("Auth2") ?>">Guru</a>
    <a class="dropdown-item" href="<?php echo base_url("Auth3") ?>">Siswa</a>
    <a class="dropdown-item" href="<?php echo base_url("Auth4") ?>">Orang Tua</a>
  </div>
</div>

</nav>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol><br><br>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <center><img src="<?php echo base_url('assets/img/slide-1.jpeg') ?>" class="d-block w-50" alt="..."></center>
    </div>
    <div class="carousel-item">
      <center><img src="<?php echo base_url('assets/img/slide-2.jpg') ?>" class="d-block w-50" alt="..."></center>
    </div>
    <div class="carousel-item">
      <center><img src="<?php echo base_url('assets/img/slide-3.jpeg') ?>" class="d-block w-50" alt="..."></center>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="card text-center m-5">
  <div class="card-header">
    <strong>SMA NEGERI 1 GIRIMARTO</strong>
  </div>
  <div class="card-body">
    <p class="card-text">
      <?php foreach($tentang_sekolah as $ttg) : ?>
      <?php echo word_limiter($ttg->profil,50) ?>
      <?php endforeach; ?>
    </p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Selengkapnya...
    </button>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tentang Sekolah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body textjustify">
        <strong>PROFIL SMA NEGERI 1 GIRIMARTO</strong><br>
        <?php foreach($tentang_sekolah as $ttg) : ?>
            <?php echo $ttg->profil ?>
        <?php endforeach; ?><br><br>

        <strong>VISI SMA NEGERI 1 GIRIMARTO</strong><br>
        <?php foreach($tentang_sekolah as $ttg) : ?>
            <?php echo $ttg->visi ?>
        <?php endforeach; ?><br><br>

        <strong>MISI SMA NEGERI 1 GIRIMARTO</strong><br>
        <?php foreach($tentang_sekolah as $ttg) : ?>
            <?php echo $ttg->misi ?>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>