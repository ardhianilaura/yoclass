<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h2>LAPORAN PENILAIAN HASIL BELAJAR SISWA</h2>

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
			<td><strong>TAHUN AKADEMIK</strong></td>
			<td>&nbsp;: <?php echo $siswa_details->tahun_akademik.'&nbsp;('.$siswa_details->status.')' ?></td>
			</tr>
		<tr>
			<td><strong>STATUS</strong></td>
			<td>&nbsp;: <?php echo $siswa_details->status ?></td>
		</tr>
	</table>
</center><br><br><br>
<center>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>MATA PELAJARAN</th>
			<th>NILAI AKHIR</th>
			<th>PREDIKAT</th>
			<th>EVALUASI</th>
		</tr>

		<?php
		$no = 1;
		foreach($Raport_data as $rp) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $rp->mapel; ?></td>
				<td><center><?php echo $rp->nilaiakhir; ?></center></td>
				<td><center><?php echo $rp->indek; ?></center></td>
				<td><?php echo $rp->evaluasi; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	</center><br><br><br>
<center>
	<table border="1">
		<tr>
			<th>KKM = 70 </th>
			<th>D = Nilai < 70 </th>
			<th>C = 70 <= Nilai < 80 </th>
			<th>B = 80 <= Nilai < 90 </th>
			<th>A = Nilai >= 90 </th>
		</tr>
	</table>
</center>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>