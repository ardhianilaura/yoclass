<div class="container-fluid">
	
	<div class="alert alert-succes">
		<i class="fas fa-comment-dots"></i> FORM BALAS PESAN
	</div>

	<?php foreach($hubungi as $hb) : ?>

		<form method="post" action="<?php echo base_url('Hubungi_kami/kirim_email_aksi') ?>">

			<div class="form-group">
				<label>Email</label>
				<input type="hidden" name="hubungi_id" value="<?php echo $hb->hubungi_id ?>">
				<input type="text" name="email" class="form-control" value="<?php echo $hb->email ?>" readonly>
			</div>

			<div class="form-group">
				<label>Subject</label>
				<input type="text" name="subject" class="form-control">
			</div>

			<div class="form-group">
				<label>Pesan</label>
				<textarea type="text" name="pesan" class="form-control" rows="5"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Kirim</button>
			
		</form>

	<?php endforeach; ?>
</div>