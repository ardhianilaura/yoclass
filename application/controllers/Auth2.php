<?php 

class Auth2 extends CI_Controller{

	public function index(){;
		$this->load->view('templates_administrator/header');
		$this->load->view('user/login');
		$this->load->view('templates_administrator/footer');
	}

	public function proses_login(){
		$this->form_validation->set_rules('username','username','required',['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('templates_administrator/header');
			$this->load->view('user/login');
			$this->load->view('templates_administrator/footer');
		}else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama_lengkap = $this->input->post('nama_lengkap');

			$user = $username;
			$pass = MD5($password);

			$cek = $this->user_model->cek_login($user, $pass);

			if ($cek->num_rows() > 0){
                // **
                // karena data yang terambil pasti hanya satu, maka tidak perlu foreach
                // cukup mengambil data pertama, atau index 0
                $login_data = $cek->result()[0];
 
                // **
                // debug to see login_data
 
                // **
                // create session data
                $sess_data['username'] = $login_data->username;
                $sess_data['email'] = $login_data->email;
                $sess_data['level'] = $login_data->level;
                $sess_data['nama_lengkap'] = $login_data->nama_lengkap;
 
                // **
                // set session
                $this->session->set_userdata($sess_data);
 
                // **
                // debug to see session result
 
                // **
                // condition if level is siswa, then get additional data from table siswa
                if($sess_data['level'] == 'guru'){
                    // **
                    // load corresponding model; which is siswa_model to get data siswa based on admin_id of logged in user
                    $this->load->model('guru_model');
                    $guru_data = $this->guru_model->ambil_guru_by_admin_id($login_data->admin_id);
 
                    // **
                    // get the specific data; which is first data of list (or index = 0)
                    $sess_data['guru_details'] = $guru_data[0];
					// $sess_data['cek'] = "cekkk";
 
                    // re-set session to include siswa_details key
                    $this->session->set_userdata($sess_data);
                    // echo $login_data->admin_id;
                    // **
                    // debug to see session result after adding siswa_details key
                    redirect('Home2');
			}else {
                $this->session->set_flashdata('pesan', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Auth2');
                }
            }else{
                $this->session->set_flashdata('pesan', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('Auth2');
		}
	}
}
	public function logout(){
		$this->session->sess_destroy();
		redirect('landing_page');
	}
}