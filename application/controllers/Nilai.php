<?php  

class Nilai extends CI_Controller{
	private $filename = "import_data_nilai";

	function __construct(){ 
		parent::__construct();

     $this->load->helper(array('url','download'));
	} 
	public function index(){
        $data['siswa'] = $this->db->query("SELECT * FROM siswa")->result();
        $data['mapel'] = $this->db->query("SELECT * FROM mata_pelajaran")->result();
        $data['downgrade_jquery'] = 1;
 
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar2');
        $this->load->view('user/nilai_form', $data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function download_format(){
    force_download('format/import_data_nilai.xlsx',NULL);

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar2');
    $this->load->view('user/import_data_nilai');
    $this->load->view('templates_administrator/footer');
  }

    function get_autocomplete_nis()
    {
        $this->load->model('Nilai_model');
        $data = $this->Nilai_model->fetch_data_nis($this->uri->segment(3));
        echo $data;
    }
 
    function get_autocomplete_mapel()
    {
        $this->load->model('Nilai_model');
        $data = $this->Nilai_model->fetch_data_mapel($this->uri->segment(3));
        echo $data;
    }

    public function form(){
    $data = array(); // Buat variabel $data sebagai array
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->nilai_model->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      } else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error'];
    }
  }
    
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar2');
    $this->load->view('user/import_data_nilai',$data);
    $this->load->view('templates_administrator/footer');
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){ 
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
      	if (empty($row['A'])) break;
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nis'=>$row['A'],
          'nik'=>$row['B'],
          'tahun_akademik'=>$row['C'],
          'semester'=>$row['D'],
          'kode_mapel'=>$row['E'],
          'ulangan_harian'=>$row['F'],
          'tugas'=>$row['G'],
          'uts'=>$row['H'], 
          'uas'=>$row['I'],
          'nilaiakhir'=>$row['J'],
          'indek'=>$row['K'],
          'evaluasi'=>$row['L'], 
        ));
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->nilai_model->insert_multiple($data);
    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"> Data Nilai Berhasil Diimport! 
        <buttom type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <button>
        </div>');
    
    redirect("nilai/daftar_nilai"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

	public function input_nilai(){
		$data = array(
			'nis' => set_value('nis'),
			'kode_mapel' => set_value('kode_mapel')
		);

		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/nilai_form", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function nilai_aksi(){
		$this->_rulesInputNilai();

		if($this->form_validation->run() == FALSE){
			$this->input_nilai();
		}else{
			$kode_mapel = $this->input->post('kode_mapel', TRUE);
			$nis = $this->input->post('nis', TRUE);

			$this->db->select('*');
			$this->db->from('nilai');

			$query = $this->db->get()->result();
			$data = array(
				'list_nilai' => $query,
				'nama_siswa' => $this->siswa_model->get_by_id($nis)->nama_siswa,
				'nis' => $nis,
				'kelas' => $this->siswa_model->get_by_id($nis)->kelas,
				'kode_mapel' => $kode_mapel,
			);
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/form_nilai", $data);
		$this->load->view("templates_administrator/footer");
	}
}
	public function _rulesInputNilai(){
		$this->form_validation->set_rules('kode_mapel','Kode Mata Pelajaran','required',['required' => 'Kode Mata Pelajaran Wajib di Isi!']);
		$this->form_validation->set_rules('nis','NIS','required',['required' => 'NIS Wajib di Isi!']);
	}

	public function simpan_nilai(){
		$kode_mapel = $this->input->post('kode_mapel');
		$nik = $this->input->post('nik');
		$nis = $this->input->post('nis');
    $tahun_akademik = $this->input->post('tahun_akademik');
    $semester = $this->input->post('semester');
		$ulangan_harian = $this->input->post('ulangan_harian');
		$tugas = $this->input->post('tugas');
		$uts = $this->input->post('uts');
		$uas = $this->input->post('uas');
		$evaluasi = $this->input->post('evaluasi');
		$nilaiakhir = ($ulangan_harian*0.15)+($tugas*0.15)+($uts*0.2)+($uas*0.5);

		$total = ($ulangan_harian*0.15)+($tugas*0.15)+($uts*0.2)+($uas*0.5);

		if ($total >= 90){
			$indek = "A";
		} elseif ($total >= 80){
			$indek = "B";
		} elseif ($total >= 70){
			$indek = "C";
		} elseif ($total < 70){
			$indek = "D";
		} else{
			$indek = "E";
		}
		
		$alldata = array(
						"ulangan_harian" => $ulangan_harian,
						"tugas" => $tugas,
						"uts" => $uts,
						"uas" => $uas,
						"nilaiakhir" => $nilaiakhir,
						"indek" => $indek,
						"evaluasi" => $evaluasi,
						"kode_mapel" => $kode_mapel,
						"nik" => $nik,
						"nis" => $nis,
            "tahun_akademik" => $tahun_akademik,
            "semester" => $semester,
					);

		$this->nilai_model->insert_data($alldata);
    	$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"> Nilai Siswa Berhasil Diinput! 
        <buttom type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <button>
        </div>');
		redirect('nilai/daftar_nilai');
	}
	public function daftar_nilai()
	{
		$data['baris']=$this->nilai_model->ambil_data();
		$this->load->view("templates_administrator/header");
		$this->load->view("templates_administrator/sidebar2");
		$this->load->view("user/daftar_nilai", $data);
		$this->load->view("templates_administrator/footer");
	}

	public function search(){
    $keyword = $this->input->post('keyword');
    $data['nilai']=$this->nilai_model->get_nilai_keyword($keyword);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar2');
    $this->load->view('user/daftar_nilai',$data);
    $this->load->view('templates_administrator/footer');
  }
}