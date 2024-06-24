<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> TENTANG SEKOLAH
	</div>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>PROFIL</th>
			<th>VISI</th>
			<th>MISI</th>
		</tr>

		<?php
		$no = 1;
		foreach ($tentang_sekolah as $ttg) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ttg->profil ?></td>
				<td><?php echo $ttg->visi ?></td>
				<td><?php echo $ttg->misi ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>