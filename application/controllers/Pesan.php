<?php 

class Pesan extends CI_Controller{

	public function index(){
		$data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar3");
		$this->load->view("siswa/kirim_pesan", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function kirim_pesan(){
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else {
			$id = $this->input->post('hubungi_id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$pesan = $this->input->post('pesan');


			$data = array(
				'nama' => $nama,
				'email' => $email,
				'pesan' => $pesan
			);

			$this->hubungi_model->insert_data($data, 'hubungi');
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Pesan Berhasil Dikirim!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Pesan/index');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('nama','Nama','required',['required' => 'Nama Wajib di Isi!']);
		$this->form_validation->set_rules('email','Email','required',['required' => 'Email Wajib di Isi!']);
		$this->form_validation->set_rules('pesan','Pesan','required',['required' => 'Pesan Wajib di Isi!']);
	}

}