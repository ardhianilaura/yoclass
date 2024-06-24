<?php 

class Hubungi_kami extends CI_Controller{

	public function index(){
		$data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/hubungi_kami", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function kirim_email($id){
		$where = array('hubungi_id' => $id);
		$data['hubungi'] = $this->hubungi_model->kirim_data($where,'hubungi')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/form_balas_email", $data);
		$this->load->view("templates_administrator/footer");
	}


	public function kirim_email_aksi(){

		$to_email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$massage = $this->input->post('pesan');
		$config = [
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => '',
			'smtp_pass' => '',
			'smtp_post' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->from('SISTEM PENILAIAN SISTEM SMA NEGERI 1 GIRIMARTO');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send()){
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Pesan Terkirim!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Hubungi_kami');
		}else{
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Pesan Tidak Terkirim!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Hubungi_kami');
		}
	}

	public function delete($id){
    $where = array('hubungi_id' => $id);
    $this->hubungi_model->hapus_data($where,'hubungi');
    $this->session->set_flashdata('pesan', 
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Pesan Berhasil di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Hubungi_kami');

  }
}