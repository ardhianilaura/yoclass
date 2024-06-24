<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h1>DATA SISWA SMA NEGERI 1 GIRIMARTO</h1></center>

	<table border="1">
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>NIS</th>
			<th>KELAS</th>
			<th>TAHUN AKADEMIK</th>
			<th>SEMESTER</th>
			<th>STATUS</th>
			<th>JALAN</th>
			<th>KECAMATAN</th>
			<th>KOTA</th>
			<th>PROVINSI</th>
			<th>NO HANDPHONE</th>
			<th>TEMPAT LAHIR</th>
			<th>TANGGAL LAHIR</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>NAMA AYAH</th>
			<th>PEKERJAAN AYAH</th>
			<th>NO TELEPON AYAH</th>
			<th>NAMA IBU</th>
			<th>PEKERJAAN IBU</th>
			<th>NO TELEPON IBU</th>
			<th>NAMA WALI</th>
			<th>NO TELEPON WALI</th>
			<th>PEKERJAAN WALI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($siswa as $sw) : ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $sw->nama_siswa ?></td>
			<td><?php echo $sw->nis ?></td>
			<td><?php echo $sw->kelas ?></td>
			<td><?php echo $sw->tahun_akademik ?></td>
			<td><?php echo $sw->semester ?></td>
			<td><?php echo $sw->status ?></td>
			<td><?php echo $sw->jalan ?></td>
			<td><?php echo $sw->kecamatan ?></td>
			<td><?php echo $sw->kota ?></td>
			<td><?php echo $sw->provinsi ?></td>
			<td><?php echo $sw->no_hp ?></td>
			<td><?php echo $sw->tempat_lahir ?></td>
			<td><?php echo $sw->tanggal_lahir ?></td>
			<td><?php echo $sw->jenis_kelamin ?></td>
			<td><?php echo $sw->agama ?></td>
			<td><?php echo $sw->nama_ayah ?></td>
			<td><?php echo $sw->pekerjaan_ayah ?></td>
			<td><?php echo $sw->no_telp_ayah ?></td>
			<td><?php echo $sw->nama_ibu ?></td>
			<td><?php echo $sw->pekerjaan_ibu ?></td>
			<td><?php echo $sw->no_telp_ayah ?></td>
			<td><?php echo $sw->nama_wali ?></td>
			<td><?php echo $sw->no_telp_wali ?></td>
			<td><?php echo $sw->pekerjaan_wali ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>