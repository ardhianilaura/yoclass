<style type="text/css">
  .td-data-empty {
    background: #E07171;
  }
</style>

<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> IMPORT DATA GURU
  </div>

  <html>
    <head>
      <title></title>
      <p>STEP 1 - Download Format Excel untuk proses import, klik link berikut : <a href="<?php echo site_url('Guru/download_format/') ?>">Download File</a></p> 
      <p>STEP 2 - Tekan Choose file untuk pilih file yang ingin diimport dan dapat melihat isi data dengan menekan Preview</p>
      <p> STEP 3 - Tekan import untuk mengimport data dari excel ke aplikasi</p>

      <!-- Load File jquery.min.js yang ada difolder js -->
      <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

      <script>
        $(document).ready(function(){
          // Sembunyikan alert validasi kosong
          $("#kosong").hide();
          });
      </script>
    </head>

    <body>
      <h3></h3>
      <hr>

      <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
      <form method="post" action="<?php echo base_url("Guru/form"); ?>" enctype="multipart/form-data">
        <!-- Buat sebuah input type file
          class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file">

        <!-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import -->
        <input type="submit" name="preview" value="Preview">
      </form>

      <?php if (!empty($this->input->post('preview'))): ?>
        <?php if (isset($upload_error)): ?>
          <div style="color:red"><?php echo $upload_error ?></div>
        <?php die; endif ?>
        <div style='color: red;' id='kosong'>
          Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
        </div>

        <table border='1' cellpadding='8'>
          <tr>
            <th colspan='22'><center>Preview Data</center></th>
          </tr>
          <tr>
            <th>Nama Guru</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>No Handphone</th>
            <th>Status</th>
            <th>Poto</th>
          </tr>
      <?php endif ?>

      <?php
        $numrow = 1; $kosong = 0;
      ?>
      <?php if (!empty($sheet)): ?>
        <?php foreach ($sheet as $row): ?>
        <?php
          // Ambil data pada excel sesuai Kolom
          $nama_guru = $row['A']; 
          $nik = $row['B'];
          $alamat = $row['C'];
          $tempat_lahir = $row['D'];
          $tanggal_lahir = $row['E'];
          $jenis_kelamin = $row['F'];
          $agama = $row['G'];
          $no_hp = $row['H'];
          $status = $row['I'];
          $poto = $row['J']; 

          // Cek jika semua data tidak diisi
          if($nama_guru == "" && $nik == "" && $alamat == "" && $tempat_lahir == "" && $tanggal_lahir == "" && $jenis_kelamin == "" && $agama == "" && $no_hp == "" && $status == "" && $poto == ""){
            continue;
          }
        ?>

        <?php
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if ($numrow > 1): ?>

          <?php
            // Jika salah satu data ada yang kosong
            if($nama_guru == "" or $nik == "" or $alamat == "" or $tempat_lahir == "" or $tanggal_lahir == "" or $jenis_kelamin == "" or $agama == "" or $no_hp == "" or $status == "" or $poto == ""){
              $kosong++; // Tambah 1 variabel $kosong
            }
          ?>

          <tr>
            <td class="<?php echo !empty($nama_guru) ? null : "td-data-empty" ?>" ><?php echo $nama_guru ?></td>
            <td class="<?php echo !empty($nik) ? null : "td-data-empty" ?>" ><?php echo $nik ?></td>
            <td class="<?php echo !empty($alamat) ? null : "td-data-empty" ?>" ><?php echo $alamat ?></td>
            <td class="<?php echo !empty($tempat_lahir) ? null : "td-data-empty" ?>" ><?php echo $tempat_lahir ?></td>
            <td class="<?php echo !empty($tanggal_lahir) ? null : "td-data-empty" ?>" ><?php echo $tanggal_lahir ?></td>
            <td class="<?php echo !empty($jenis_kelamin) ? null : "td-data-empty" ?>" ><?php echo $jenis_kelamin ?></td>
            <td class="<?php echo !empty($agama) ? null : "td-data-empty" ?>" ><?php echo $agama ?></td>
            <td class="<?php echo !empty($no_hp) ? null : "td-data-empty" ?>" ><?php echo $no_hp ?></td>
            <td class="<?php echo !empty($status) ? null : "td-data-empty" ?>" ><?php echo $status ?></td>
            <td class="<?php echo !empty($poto) ? null : "td-data-empty" ?>" ><?php echo $poto ?></td>
          </tr>
        <?php endif ?>
        <?php
          // Tambah 1 setiap kali looping
          $numrow++;
        ?>
      <?php endforeach ?>         
      <?php endif ?>
        </table>

      <?php if ($kosong > 0): ?>
        <script>
          $(document).ready(function(){
            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
            $("#jumlah_kosong").html('<?php echo $kosong; ?>');
            
            $("#kosong").show(); // Munculkan alert validasi kosong
          });
        </script>
      <?php else: ?>
        <hr>
        <form method="post" action="<?= base_url()."Guru/import" ?>">
          <!-- Buat sebuah tombol untuk mengimport data ke database -->
          <input type="submit" name="import" value="Import">
          <a href='".base_url("Guru")."'>Cancel</a>
        </form>
      <?php endif ?>
      <!-- editan Haerun -->
    </body>
  </html>