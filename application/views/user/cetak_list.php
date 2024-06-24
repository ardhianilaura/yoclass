<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> CETAK RAPORT
	</div>

	<center class="mb-4">
		<legend class="mt-3"><strong>LAPORAN PENILAIAN HASIL BELAJAR SISWA</strong></legend>

		<table>
			<tr>
				<td><strong>NIS</strong></td>
				<td>&nbsp;: <?php echo $nis ?></td>
			</tr>
			<tr>
				<td><strong>NAMA LENGKAP</strong></td>
				<td>&nbsp;: <?php echo $nama_siswa ?></td>
			</tr>
			<tr>
				<td><strong>TAHUN AKADEMIK (Semester)</strong></td>
				<td>&nbsp;: <?php echo $tahun_akademik.'&nbsp;('.$semester.')'; ?></td>
			</tr>
			<tr>
				<td><strong>STATUS</strong></td>
				<td>&nbsp;: <?php echo $status ?></td>
			</tr>
		</table>
	</center>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
			<th>KODE MATA PELAJARAN</th>
			<th>MATA PELAJARAN</th>
			<th>NILAI</th>
			<th>KKM</th>
			<th>KETERANGAN</th>
		</tr>

		<?php
		$no = 1;
		foreach($raport_data as $rp) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $rp->kode_mapel; ?></td>
				<td><?php echo $rp->mapel; ?></td>
				<td><?php echo $rp->nilai; ?></td>
				<td><?php echo $rp->kkm; ?></td>
				<td><?php echo $rp->keterangan; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>