<style type="text/css">
  .td-data-empty {
    background: #E07171;
  }
</style>

<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> IMPORT DATA NILAI
  </div>

  <html>
    <head>
      <title></title>
      <p>STEP 1 - Download Format Excel untuk proses import, klik link berikut : <a href="<?php echo site_url('Nilai/download_format/') ?>">Download File</a></p> 
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
      <form method="post" action="<?php echo base_url("Nilai/form"); ?>" enctype="multipart/form-data">
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
            <th>NIS</th>
            <th>NIK</th>
            <th>Kode Mata Pelajaran</th>
            <th>Ulangan Harian</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Predikat</th>
            <th>Evaluasi</th>
          </tr>
      <?php endif ?>

      <?php
        $numrow = 1; $kosong = 0;
      ?>
      <?php if (!empty($sheet)): ?>
        <?php foreach ($sheet as $row): ?>
        <?php
          // Ambil data pada excel sesuai Kolom
          $nis = $row['A']; 
          $nik = $row['B']; 
          $kode_mapel = $row['C'];
          $ulangan_harian = $row['D'];
          $tugas = $row['E'];
          $uts = $row['F'];
          $uas = $row['G'];
          $nilaiakhir= $row['H'];
          $indek = $row['I'];
          $evaluasi = $row['J'];
    

          // Cek jika semua data tidak diisi
          if($nis == "" && $nik == "" && $kode_mapel == "" && $ulangan_harian == "" && $tugas == "" && $uts == "" && $uas == "" && $nilaiakhir == "" && $indek == "" && $evaluasi == ""){
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
            if($nis == "" or $nik == "" or$kode_mapel == "" or $ulangan_harian == "" or $tugas == "" or $uts == "" or $uas == "" or $nilaiakhir == "" or $indek == "" or $evaluasi == ""){
              $kosong++; // Tambah 1 variabel $kosong
            }
          ?>

          <tr>
            <td class="<?php echo !empty($nis) ? null : "td-data-empty" ?>" ><?php echo $nis ?></td>
            <td class="<?php echo !empty($nik) ? null : "td-data-empty" ?>" ><?php echo $nik ?></td>
            <td class="<?php echo !empty($kode_mapel) ? null : "td-data-empty" ?>" ><?php echo $kode_mapel ?></td>
            <td class="<?php echo !empty($ulangan_harian) ? null : "td-data-empty" ?>" ><?php echo $ulangan_harian ?></td>
            <td class="<?php echo !empty($tugas) ? null : "td-data-empty" ?>" ><?php echo $tugas ?></td>
            <td class="<?php echo !empty($uts) ? null : "td-data-empty" ?>" ><?php echo $uts ?></td>
            <td class="<?php echo !empty($uas) ? null : "td-data-empty" ?>" ><?php echo $uas ?></td>
            <td class="<?php echo !empty($nilaiakhir) ? null : "td-data-empty" ?>" ><?php echo $nilaiakhir ?></td>
            <td class="<?php echo !empty($indek) ? null : "td-data-empty" ?>" ><?php echo $indek ?></td>
            <td class="<?php echo !empty($evaluasi) ? null : "td-data-empty" ?>" ><?php echo $evaluasi ?></td>
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
        <form method="post" action="<?= base_url()."nilai/import" ?>">
          <!-- Buat sebuah tombol untuk mengimport data ke database -->
          <input type="submit" name="import" value="Import">
        </form>
      <?php endif ?>
      <!-- editan Haerun -->
    </body>
  </html>