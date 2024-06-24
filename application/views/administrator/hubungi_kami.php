<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> PESAN DARI USER
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th width="20px">NO</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>PESAN</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($hubungi as $hb) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $hb->nama ?></td>
				<td><?php echo $hb->email ?></td>
				<td><?php echo $hb->pesan ?></td>
				<td width="20px"><?php echo anchor('Hubungi_kami/kirim_email/'.$hb->hubungi_id,'<div class="btn btn-sm btn-primary"><i class="fas fa-comment-dots"></i></div>')?></td>
				<td width="20px"><?php echo anchor('Hubungi_kami/delete/'.$hb->hubungi_id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>