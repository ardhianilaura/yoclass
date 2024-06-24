<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> TENTANG SEKOLAH
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>PROFIL</th>
			<th>VISI</th>
			<th>MISI</th>
			<th>AKSI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($tentang_sekolah as $ttg) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ttg->profil ?></td>
				<td><?php echo $ttg->visi ?></td>
				<td><?php echo $ttg->misi ?></td>
				<td width="20px"><?php echo anchor('Tentang_sekolah/update/'.$ttg->tentang_sekolah_id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>