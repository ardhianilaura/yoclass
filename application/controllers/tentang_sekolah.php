 <?php 

class Tentang_sekolah extends CI_Controller{

	public function index(){
		$data['tentang_sekolah'] = $this->tentangsekolah_model->tampil_data('tentang_sekolah')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/tentang_sekolah", $data);
		$this->load->view("templates_administrator/footer");
	}


	public function update($id){
		$where = array('tentang_sekolah_id' => $id);
		$data['tentang_sekolah'] = $this->tentangsekolah_model->edit_data($where,'tentang_sekolah')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar");
		$this->load->view("administrator/tentang_sekolah_update", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function update_aksi(){
		$id = $this->input->post('tentang_sekolah_id');
		$profil = $this->input->post('profil');
		$visi = $this->input->post('visi');
		$misi = $this->input->post('misi');

		$data = array(
			'profil' => $profil,
			'visi' => $visi,
			'misi' =>$misi
		);
		
		$where = array(
			'tentang_sekolah_id' => $id
		);

		$this->tentangsekolah_model->update_data($where,$data,'tentang_sekolah');
		$this->session->set_flashdata('pesan', 
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
  					Data Tentang Sekolah Berhasil di Update!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
		redirect('Tentang_sekolah');
	}
}