<?php 

class Cetak_raport extends CI_Controller{
 
	public function index(){
		$data=$this->db->query("SELECT * FROM siswa");
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar3");
		$this->load->view("siswa/masuk_raport", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function print(){
   	$data['siswa_details'] = $this->session->userdata()['siswa_details'];
	$data['raport_data'] = $this->baca_raport($this->session->userdata()['siswa_details']->nis);
    $this->load->view('siswa/print_nilai', $data);
  	}

	public function cetak_aksi(){
		$data['siswa_details'] = $this->session->userdata()['siswa_details'];
		$data['Raport_data'] = $this->baca_raport($this->session->userdata()['siswa_details']->nis);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar3");
		$this->load->view("siswa/cetak_list", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function baca_raport($nis){
		$this->db->select('m.kode_mapel,m.mapel,n.tahun_akademik,n.semester,n.nilaiakhir,n.indek,n.evaluasi');
		$this->db->from('mata_pelajaran as m');
		$this->db->join('nilai as n','n.kode_mapel = m.kode_mapel');
		$this->db->where('n.nis',$nis);

		$raport = $this->db->get()->result(); 
		return $raport;
	}

	public function pilih_aksi(){
		$data['siswa_details'] = $this->session->userdata()['siswa_details'];
		$this->load->model('nilai_model');
    	$tahun_akademik = $this->nilai_model->ambil_tahun_akademik();
    	$semester = $this->nilai_model->ambil_semester();
    	$data = array(
    		'tahun_akademik' => $tahun_akademik,
    		'semester' => $semester
    );
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar3");
		$this->load->view("siswa/lihat_tas", $data);
		$this->load->view("templates_administrator/footer");
	}

}