<?php 

class Landing_page extends CI_Controller{

	public function index(){
		$data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
		$data['tentang_sekolah'] = $this->tentangsekolah_model->tampil_data('tentang_sekolah')->result();
		$data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("landing_page", $data);
		$this->load->view("templates_administrator/footer");
	}
}