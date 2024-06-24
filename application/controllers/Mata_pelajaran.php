<?php 

class Mata_pelajaran extends CI_Controller{

	public function index(){
		$data['mata_pelajaran'] = $this->mapel_model->tampil_data()->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/mata_pelajaran", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function search(){
    $keyword = $this->input->post('keyword');
    $data['mata_pelajaran']=$this->mapel_model->get_mapel_keyword($keyword);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/mata_pelajaran',$data);
    $this->load->view('templates_administrator/footer');
  }

	public function input(){
		$data = array(
			'kode_mapel' => set_value('kode_mapel'),
			'mapel' => set_value('mapel'),
			'jp' => set_value('jp')
		);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/mata_pelajaran_form", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function input_aksi(){
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->input();
		}else {
			$data = array(
				'kode_mapel' => $this->input->post('kode_mapel', TRUE),
				'mapel' => $this->input->post('mapel'),
				'jp' => $this->input->post('jp')
			);

			$this->mapel_model->input_data($data);
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Data Mata Pelajaran Berhasil Ditambahkan!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Mata_pelajaran');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('kode_mapel','Kode Mata Pelajaran','required');
		$this->form_validation->set_rules('mapel','Mata Pelajaran','required');
	}

	public function update($id){
		$where = array('kode_mapel' => $id);
		$data['mata_pelajaran'] = $this->mapel_model->edit_data($where,'mata_pelajaran')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/mata_pelajaran_update", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function update_aksi(){
		$kode_mapel = $this->input->post('kode_mapel');
		$mapel = $this->input->post('mapel');
		$jp = $this->input->post('jp');

		$data = array(
			'kode_mapel' => $kode_mapel,
			'mapel' => $mapel,
			'jp' => $jp
		);

		$where = array(
			'kode_mapel' => $kode_mapel
		);

		$this->mapel_model->update_data($where,$data,'mata_pelajaran');
		$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Data Mata Pelajaran Berhasil di Update!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
		redirect('Mata_pelajaran');
	}

	public function delete($id){
		$where = array('kode_mapel' => $id);
		$this->mapel_model->hapus_data($where,'mata_pelajaran');
		$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Data Mata Pelajaran Berhasil di Hapus!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
		redirect('Mata_pelajaran');

	}
}