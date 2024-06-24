<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> DAFTAR NILAI SISWA
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Mata Pelajaran</th>
			<th>Tahun Akademik</th>
			<th>Semester</th>
			<th>Ulangan Harian</th>
			<th>Tugas</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai Akhir</th>
			<th>Predikat</th>
			<th>Evaluasi</th>
		</tr>

		<?php
		$no = 1;
		foreach ($baris as $row) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->nama_siswa ?></td>
				<td><?php echo $row->kelas ?></td>
				<td><?php echo $row->mapel ?></td>
				<td><?php echo $row->tahun_akademik ?></td>
				<td><?php echo $row->semester ?></td>
				<td><?php echo $row->ulangan_harian ?></td>
				<td><?php echo $row->tugas ?></td>
				<td><?php echo $row->uts ?></td>
				<td><?php echo $row->uas ?></td>
				<td><?php echo $row->nilaiakhir ?></td>
				<td><?php echo $row->indek ?></td>
				<td><?php echo $row->evaluasi ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>