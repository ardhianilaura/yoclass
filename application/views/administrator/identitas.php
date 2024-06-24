<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> IDENTITAS
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>NAMA WEBSITE</th>
			<th>ALAMAT</th>
			<th>EMAIL</th>
			<th>NO TELEPON</th>
			<th>AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($identitas as $idt) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $idt->nama_website ?></td>
				<td><?php echo $idt->alamat ?></td>
				<td><?php echo $idt->email ?></td>
				<td><?php echo $idt->telp ?></td>
				<td width="20px"><?php echo anchor('Identitas/update/'.$idt->identitas_id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>