<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Mata Pelajaran
	</div>

	<div class="navbar-form navbar-search">
    <?php echo form_open('Mata_pelajaran/search') ?>
    <input type="text" name="keyword" class="form-control" placeholder="Search" style="width: 25%"><br>
    <button type="submit" class="btn btn-primary">Cari</button>
    <?php echo form_close() ?><br>
  </div>

	<?php echo anchor('Mata_pelajaran/input','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>') ?>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>KODE MATA PELAJARAN</th>
			<th>MATA PELAJARAN</th>
			<th>JAM PERTEMUAN</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($mata_pelajaran as $mp) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $mp->kode_mapel ?></td>
				<td><?php echo $mp->mapel ?></td>
				<td><center><?php echo $mp->jp ?></center></td>
				<td width="20px"><?php echo anchor('Mata_pelajaran/update/'.$mp->kode_mapel,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
				<td width="20px"><?php echo anchor('Mata_pelajaran/delete/'.$mp->kode_mapel,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>