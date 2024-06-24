<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Kelas
	</div>

	<div class="navbar-form navbar-search">
    <?php echo form_open('Kelas/search') ?>
    <input type="text" name="keyword" class="form-control" placeholder="Search" style="width: 25%"><br>
    <button type="submit" class="btn btn-primary">Cari</button>
    <?php echo form_close() ?><br>
  </div>

	<?php echo anchor('Kelas/input','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>') ?>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>Kode Kelas</th>
			<th>Kelas</th>
			
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($class as $kl) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $kl->kode_kelas ?></td>
				<td><?php echo $kl->kelas ?></td>
				<td width="20px"><?php echo anchor('Kelas/update/'.$kl->kode_kelas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
				<td width="20px"><?php echo anchor('Kelas/delete/'.$kl->kode_kelas,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>')?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>