<?php 

class Kelas extends CI_Controller{

	public function index(){
		$data['class'] = $this->kelas_model->tampil_data()->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/kelas", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function search(){
    $keyword = $this->input->post('keyword');
    $data['class']=$this->kelas_model->get_kelas_keyword($keyword);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/kelas',$data);
    $this->load->view('templates_administrator/footer');
  }

	public function input(){
		$data = array(
			'kode_kelas' => set_value('kode_kelas'),
			'kelas' => set_value('kelas')
		);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/kelas_form", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function input_aksi(){
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->input();
		}else {
			$data = array(
				'kode_kelas' => $this->input->post('kode_kelas'),
				'kelas' => $this->input->post('kelas')
			);

			$this->kelas_model->input_data($data);
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Data Kelas Berhasil Ditambahkan!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Kelas');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('kode_kelas','Kode Kelas','required');
		$this->form_validation->set_rules('kelas','Kelas','required');
	}

	public function update($kode_kelas){
		$where = array('kode_kelas' => $kode_kelas);
		$data['kelas'] = $this->kelas_model->edit_data($where,'class')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/kelas_update", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function update_aksi(){
		$kode_kelas = $this->input->post('kode_kelas');
		$kelas = $this->input->post('kelas');

		$data = array(
			'kode_kelas' => $kode_kelas,
			'kelas' => $kelas
		);

		$where = array(
			'kode_kelas' => $kode_kelas
		);

		$this->kelas_model->update_data($where,$data,'class');
		$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Data Kelas Berhasil di Update!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
		redirect('Kelas');
	}

	public function delete($kode_kelas){
		$where = array('kode_kelas' => $kode_kelas);
		$this->kelas_model->hapus_data($where,'class');
		$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Data Kelas Berhasil di Hapus!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
		redirect('Kelas');
	}
}
