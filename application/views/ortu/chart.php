<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> LIHAT HASIL BELAJAR SISWA
	</div>
	<center>
	<legend class="mt-3"><strong>LAPORAN PENILAIAN HASIL BELAJAR SISWA</strong></legend>

		<table>
			<tr>
				<td><strong>NIS</strong></td>
				<td>&nbsp;: <?php echo $ortu_details->nis ?></td>
			</tr>
			<tr>
				<td><strong>NAMA LENGKAP</strong></td>
				<td>&nbsp;: <?php echo $ortu_details->nama_siswa ?></td>
			</tr>
			<tr>
				<td><strong>KELAS</strong></td>
				<td>&nbsp;: <?php echo $ortu_details->kelas ?></td>
			</tr>
		</table>
	</center><br><br>
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>NO</th>
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
				<td><?php echo $rp->mapel; ?></td>
				<td><?php echo $rp->nilaiakhir; ?></td>
				<td><?php echo $rp->indek; ?></td>
				<td><?php echo $rp->evaluasi; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>