 <?php 

Class Home2 extends CI_Controller {

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
			redirect('Auth2');
		}
	}
 
	public function index() {
		$data = $this->user_model->ambil_data($this->session->userdata['nama_lengkap']);
		$data = array(
			'nama_lengkap' => $data->nama_lengkap,
			'level'	   => $data->level
		);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/dashboard", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function tentang_sekolah(){
		$data['tentang_sekolah'] = $this->tentangsekolah_model->tampil_data('tentang_sekolah')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/tentang_sekolah", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function identitas(){
		$data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/identitas", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function siswa(){
    	$data['guru_details'] = $this->session->userdata()['guru_details'];
    	$data['data_siswa'] = $this->data_siswa($this->session->userdata()['guru_details']->nama_guru);
    	$this->load->view('templates_administrator/header');
    	$this->load->view('templates_administrator/sidebar2');
    	$this->load->view('user/siswa',$data);
    	$this->load->view('templates_administrator/footer');
    }

  	public function detail($nis){
    	$data['detail'] = $this->siswa_model->ambil_siswa_id($nis);
    	$this->load->view('templates_administrator/header');
    	$this->load->view('templates_administrator/sidebar2');
    	$this->load->view('user/siswa_detail',$data);
    	$this->load->view('templates_administrator/footer');
	}

	public function data_siswa($nama_guru){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nama_guru',$nama_guru);

		$siswa = $this->db->get()->result(); 
		return $siswa;		
	}
}