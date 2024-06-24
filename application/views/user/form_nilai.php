<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> INPUT NILAI SISWA
	</div>

	<center class="mb-4">
		<legend class="mt-3"><strong>MASUKKAN NILAI AKHIR</strong></legend>

		<table>
			<tr> 
				<td><strong>NAMA SISWA</strong></td>
				<td>&nbsp;: <?php echo $nama_siswa ?></td>
			</tr>
			<tr> 
				<td><strong>NIS</strong></td>
				<td>&nbsp;: <?php echo $nis ?></td>
			</tr>
			<tr> 
				<td><strong>KELAS</strong></td>
				<td>&nbsp;: <?php echo $kelas ?></td>
			</tr>
			<tr> 
				<td><strong>KODE MATA PELAJARAN</strong></td>
				<td>&nbsp;: <?php echo $kode_mapel ?></td>
			</tr>
		</table>
	</center>
	<form method="post" action="<?php echo base_url('Nilai/simpan_nilai'); ?>">
		<div class="form-group">
			<?php 
				$this->db->join('system_login', 'system_login.admin_id=guru.admin_id');
				$this->db->where('username',$this->session->username);
				$row = $this->db->get('guru')->row();
				$nik = $row->nik;
			 ?>
			<input type="hidden" name="nis" value="<?php echo $nis ?>">
			<input type="hidden" name="kelas" value="<?php echo $kelas ?>">
			<input type="hidden" name="kode_mapel" value="<?php echo $kode_mapel ?>">
			<input type="hidden" name="nik" value="<?php echo $nik ?>">
		</div>
		<div class="form-group">
			<label>TAHUN AKADEMIK</label>
			<input type="text" name="tahun_akademik" class="form-control">
			<?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>SEMESTER</label>
			<input type="text" name="semester" class="form-control">
			<?php echo form_error('semester', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>ULANGAN HARIAN</label>
			<input type="text" name="ulangan_harian" class="form-control">
			<?php echo form_error('ulangan_harian', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>TUGAS</label>
			<input type="text" name="tugas" class="form-control">
			<?php echo form_error('tugas', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>UTS</label>
			<input type="text" name="uts" class="form-control">
			<?php echo form_error('uts', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>UAS</label>
			<input type="text" name="uas" class="form-control">
			<?php echo form_error('uas', '<div class="text-danger small ml-3">','</div>') ?>
		</div>
		<div class="form-group">
			<label>Evaluasi</label>
			<input type="text" name="evaluasi" class="form-control">
			<?php echo form_error('evaluasi', '<div class="text-danger small ml-3">','</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>