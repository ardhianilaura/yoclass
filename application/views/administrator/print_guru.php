<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h2>DATA-DATA GURU DI SMA NEGERI 1 GIRIMARTO</h2><br><br>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>NIK</th>
			<th>ALAMAT</th>
			<th>TEMPAT LAHIR</th>
			<th>TANGGAL LAHIR</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>NO HANDPHONE</th>
			<th>STATUS</th>
		</tr>

		<?php
		$no = 1;
		foreach ($guru as $gr) : ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $gr->nama_guru ?></td>
			<td><?php echo $gr->nik ?></td>	
			<td><?php echo $gr->alamat ?></td>
			<td><?php echo $gr->tempat_lahir ?></td>
			<td><?php echo $gr->tanggal_lahir ?></td>
			<td><?php echo $gr->jenis_kelamin ?></td>
			<td><?php echo $gr->agama ?></td>
			<td><?php echo $gr->no_hp ?></td>
			<td><?php echo $gr->status ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>