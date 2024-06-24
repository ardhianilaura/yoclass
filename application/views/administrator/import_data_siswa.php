<style type="text/css">
  .td-data-empty {
    background: #E07171;
  }
</style>

<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> IMPORT DATA SISWA
  </div>

  <html>
    <head>
      <title></title>
      <p>STEP 1 - Download Format Excel untuk proses import, klik link berikut : <a href="<?php echo site_url('Siswa/download_format/') ?>">Download File</a></p> 
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
      <form method="post" action="<?php echo base_url("Siswa/form"); ?>" enctype="multipart/form-data">
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
            <th>Nama Siswa</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Tahun Akademik</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Alamat</th>
            <th>No Handphone</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Nama Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>No Telepon Ayah</th>
            <th>Nama Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>No Telepon Ibu</th>
            <th>Nama Wali</th>
            <th>No Telepon Wali</th>
            <th>Pekerjaan Wali</th>
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
          $nama_siswa = $row['A']; 
          $nis = $row['B'];
          $kelas = $row['C'];
          $tahun_akademik = $row['D'];
          $semester = $row['E'];
          $status = $row['F'];
          $alamat = $row['G'];
          $no_hp = $row['H'];
          $tempat_lahir = $row['I'];
          $tanggal_lahir = $row['J']; 
          $jenis_kelamin = $row['K']; 
          $agama = $row['L'];
          $nama_ayah = $row['M'];
          $pekerjaan_ayah = $row['N'];
          $no_telp_ayah = $row['O'];
          $nama_ibu = $row['P'];
          $pekerjaan_ibu = $row['Q'];
          $no_telp_ibu = $row['R'];
          $nama_wali = $row['S'];
          $no_telp_wali = $row['T'];
          $pekerjaan_wali = $row['U']; 
          $poto = $row['V'];

          // Cek jika semua data tidak diisi
          if($nama_siswa == "" && $nis == "" && $kelas == "" && $tahun_akademik == "" && $semester == "" && $status == "" && $alamat == "" && $no_hp == "" && $tempat_lahir == "" && $tanggal_lahir == "" && $jenis_kelamin == "" && $agama == "" && $nama_ayah == "" && $pekerjaan_ayah == "" && $no_telp_ayah == "" && $nama_ibu == "" && $pekerjaan_ibu == "" && $no_telp_ibu == "" && $nama_wali == "" && $no_telp_wali == "" && $pekerjaan_wali == "" && $poto == ""){
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
            if($nama_siswa == "" or $nis == "" or $kelas == "" or $tahun_akademik == "" or $semester == "" or $status == "" or $alamat == "" or $no_hp == "" or $tempat_lahir == "" or $tanggal_lahir == "" or $jenis_kelamin == "" or $agama == "" or $nama_ayah == "" or $pekerjaan_ayah == "" or $no_telp_ayah == "" or $nama_ibu == "" or $pekerjaan_ibu == "" or $no_telp_ibu == "" or $nama_wali == "" or $no_telp_wali == "" or $pekerjaan_wali == "" or $poto == ""){
              $kosong++; // Tambah 1 variabel $kosong
            }
          ?>

          <tr>
            <td class="<?php echo !empty($nama_siswa) ? null : "td-data-empty" ?>" ><?php echo $nama_siswa ?></td>
            <td class="<?php echo !empty($nis) ? null : "td-data-empty" ?>" ><?php echo $nis ?></td>
            <td class="<?php echo !empty($kelas) ? null : "td-data-empty" ?>" ><?php echo $kelas ?></td>
            <td class="<?php echo !empty($tahun_akademik) ? null : "td-data-empty" ?>" ><?php echo $tahun_akademik ?></td>
            <td class="<?php echo !empty($semester) ? null : "td-data-empty" ?>" ><?php echo $semester ?></td>
            <td class="<?php echo !empty($status) ? null : "td-data-empty" ?>" ><?php echo $status ?></td>
            <td class="<?php echo !empty($alamat) ? null : "td-data-empty" ?>" ><?php echo $alamat ?></td>
            <td class="<?php echo !empty($no_hp) ? null : "td-data-empty" ?>" ><?php echo $no_hp ?></td>
            <td class="<?php echo !empty($tempat_lahir) ? null : "td-data-empty" ?>" ><?php echo $tempat_lahir ?></td>
            <td class="<?php echo !empty($tanggal_lahir) ? null : "td-data-empty" ?>" ><?php echo $tanggal_lahir ?></td>
            <td class="<?php echo !empty($jenis_kelamin) ? null : "td-data-empty" ?>" ><?php echo $jenis_kelamin ?></td>
            <td class="<?php echo !empty($agama) ? null : "td-data-empty" ?>" ><?php echo $agama ?></td>
            <td class="<?php echo !empty($nama_ayah) ? null : "td-data-empty" ?>" ><?php echo $nama_ayah ?></td>
            <td class="<?php echo !empty($pekerjaan_ayah) ? null : "td-data-empty" ?>" ><?php echo $pekerjaan_ayah ?></td>
            <td class="<?php echo !empty($no_telp_ayah) ? null : "td-data-empty" ?>" ><?php echo $no_telp_ayah ?></td>
            <td class="<?php echo !empty($nama_ibu) ? null : "td-data-empty" ?>" ><?php echo $nama_ibu ?></td>
            <td class="<?php echo !empty($pekerjaan_ibu) ? null : "td-data-empty" ?>" ><?php echo $pekerjaan_ibu ?></td>
            <td class="<?php echo !empty($no_telp_ibu) ? null : "td-data-empty" ?>" ><?php echo $no_telp_ibu ?></td>
            <td class="<?php echo !empty($nama_wali) ? null : "td-data-empty" ?>" ><?php echo $nama_wali ?></td>
            <td class="<?php echo !empty($no_telp_wali) ? null : "td-data-empty" ?>" ><?php echo $no_telp_wali ?></td>
            <td class="<?php echo !empty($pekerjaan_wali) ? null : "td-data-empty" ?>" ><?php echo $pekerjaan_wali ?></td>
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
        <form method="post" action="<?= base_url("siswa/import") ?>">
          <!-- Buat sebuah tombol untuk mengimport data ke database -->
          <input type="submit" name="import" value="Import">
          <a href="http://localhost/yoclass/Siswa">Cancel</a>
        </form>
      <?php endif ?>
      <!-- editan Haerun -->
    </body>
  </html>