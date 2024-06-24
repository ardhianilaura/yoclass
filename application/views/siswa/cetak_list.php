<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> LIHAT HASIL BELAJAR SISWA
	</div>

	<center class="mb-4">
		<legend class="mt-3"><strong>LAPORAN PENILAIAN HASIL BELAJAR SISWA</strong></legend>

		<table>
			<tr>
				<td><strong>NIS</strong></td>
				<td>&nbsp;: <?php echo $siswa_details->nis ?></td>
			</tr>
			<tr>
				<td><strong>NAMA LENGKAP</strong></td>
				<td>&nbsp;: <?php echo $siswa_details->nama_siswa ?></td>
			</tr>
			<tr>
				<td><strong>KELAS</strong></td>
				<td>&nbsp;: <?php echo $siswa_details->kelas ?></td>
			</tr>
			<tr>
				<td><strong>STATUS</strong></td>
				<td>&nbsp;: <?php echo $siswa_details->status ?></td>
			</tr>
		</table>
	</center>

	<?php echo form_open_multipart('Cetak_raport/pilih_aksi') ?>

	<div class="form-group">
		<td>Tahun Akademik</td>
		<td>:</td>
		<td><select name="tahun_akademik">
				<option value="">-- Semua --</option>
				<option>2020/2021</option>
				<option>2021/2022</option>
			</select></td>
	</div>

	<div class="form-group">
		<td>Semester</td>
		<td>:</td>
		<td><select name="semester">
				<option value="">-- Semua --</option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select></td>
	</div>

	<button type="submit">Pilih</button>
	<?php form_close(); ?>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>KODE MATA PELAJARAN</th>
			<th>TAHUN AKADEMIK</th>
			<th>SEMESTER</th>
			<th>MATA PELAJARAN</th>
			<th>NILAI</th>
			<th>PREDIKAT</th>
			<th>EVALUASI</th>
		</tr>

		<?php
		$no = 1;
		foreach($Raport_data as $rp) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $rp->kode_mapel; ?></td>
				<td><?php echo $rp->mapel; ?></td>
				<td><?php echo $rp->tahun_akademik; ?></td>
				<td><?php echo $rp->semester; ?></td>	
				<center><td><?php echo $rp->nilaiakhir; ?></td></center>
				<td><?php echo $rp->indek; ?></td>
				<td><?php echo $rp->evaluasi; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>