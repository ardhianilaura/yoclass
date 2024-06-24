 <?php 

Class Home3 extends CI_Controller {

	function __construct(){
		parent::__construct();

		if (!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Anda Belum Login!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
			redirect('Auth3');
		}
	}
 
	public function index() {
		$data = $this->logsiswa_model->ambil_data($this->session->userdata['nama_lengkap']);
		$data = array(
			'nama_lengkap' => $data->nama_lengkap,
			'level'	   => $data->level
		);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar3");
		$this->load->view("siswa/dashboard", $data);
		$this->load->view("templates_administrator/footer");
	}
}