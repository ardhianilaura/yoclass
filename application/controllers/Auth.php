<?php 

class Auth extends CI_Controller{

	public function index(){;
		$this->load->view('templates_administrator/header');
		$this->load->view('administrator/login');
		$this->load->view('templates_administrator/footer');
	}

	public function proses_login(){
		$this->form_validation->set_rules('username','username','required',['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates_administrator/header');
			$this->load->view('administrator/login');
			$this->load->view('templates_administrator/footer');
		}else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama_lengkap = $this->input->post('nama_lengkap');

			$user = $username;
			$pass = MD5($password);

			$cek = $this->login_model->cek_login($user, $pass);

			if ($cek->num_rows() > 0){
				foreach ($cek->result() as $ck){
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;
					$sess_data['nama_lengkap'] = $ck->nama_lengkap;

					$this->session->set_userdata($sess_data);
				}
				if($sess_data['level'] == 'admin'){
				redirect('Home');
			}else {
				$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Username atau Password Salah!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
				redirect('Auth');
				}
			}else{
				$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Username atau Password Salah!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
				redirect('Auth');
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('landing_page');
	}
}