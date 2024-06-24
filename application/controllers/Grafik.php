<?php  

class Grafik extends CI_Controller{

	public function index(){
		$data=$this->db->query("SELECT * FROM siswa");
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar4");
		$this->load->view("ortu/masuk_chart", $data);
		$this->load->view("templates_administrator/footer");
	} 

	public function cetak_aksi(){
		$data['ortu_details'] = $this->session->userdata()['ortu_details'];
		$data['Raport_data'] = $this->baca_raport($this->session->userdata()['ortu_details']->nis);
		// var_dump($this->session->userdata()['ortu_details']->nis);
		// var_dump($_SESSION['ortu_details']);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar4");
		$this->load->view("ortu/chart", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function baca_raport($nis){
		$this->db->select('m.kode_mapel,m.mapel,n.ulangan_harian,n.tugas,n.uts,n.uas,n.nilaiakhir,n.indek, n.evaluasi');
		$this->db->from('mata_pelajaran as m');
		$this->db->join('nilai as n','n.kode_mapel = m.kode_mapel');
		$this->db->where('n.nis',$nis);

		$raport = $this->db->get()->result(); 
		return $raport;
	}

}