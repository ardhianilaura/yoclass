f (!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Anda Belum Login!
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button></div>');
			redirect('http://localhost/yoclass');
