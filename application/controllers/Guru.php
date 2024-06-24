<?php 
 
class Guru extends CI_Controller{
  private $filename = "import_data_guru";

  public function __construct(){
    parent::__construct();

    $this->load->helper(array('url','download'));
  }

  public function index(){
    $data['guru'] = $this->guru_model->tampil_data();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/guru',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function download_format(){
    force_download('format/import_data_guru.xlsx',NULL);

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/import_data_guru');
    $this->load->view('templates_administrator/footer');
  }
 
  public function form(){
    $data = array(); // Buat variabel $data sebagai array
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->guru_model->upload_file($this->filename);
      
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
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/import_data_guru',$data);
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
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nama_guru'=>$row['A'], 
          'nik'=>$row['B'],
          'jalan'=>$row['C'],
          'kecamatan'=>$row['D'],
          'kota'=>$row['E'],
          'provinsi'=>$row['F'],
          'tempat_lahir'=>$row['G'],
          'tanggal_lahir'=>$row['H'],
          'jenis_kelamin'=>$row['I'],
          'agama'=>$row['J'],
          'no_hp'=>$row['K'],
          'status'=>$row['L'],
          'poto'=>$row['M'],
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->guru_model->insert_multiple($data);
    $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru Berhasil di Import!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect("Guru"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

  public function search(){
    $keyword = $this->input->post('keyword');
    $data['guru']=$this->guru_model->get_guru_keyword($keyword);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/guru',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function print(){
    $data['guru'] = $this->guru_model->tampil_data('guru')->result();
    $this->load->view('administrator/print_guru', $data);
  }

  public function detail($nik){
    $data['detail'] = $this->guru_model->ambil_guru_id($nik);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/guru_detail',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_guru(){
    $data = array(
        'nama_guru'      => set_value('nama_guru'),
        'nik'       => set_value('nik'),
        'jalan'    => set_value('jalan'),
        'kecamatan'    => set_value('kecamatan'),
        'kota'    => set_value('kota'),
        'provinsi'    => set_value('provinsi'),
        'tempat_lahir' => set_value('tempat_lahir'),
        'tanggal_lahir' => set_value('tanggal_lahir'),
        'jenis_kelamin' => set_value('jenis_kelamin'),
        'agama' => set_value('agama'),
        'no_hp' => set_value('no_hp'),
        'status' => set_value('status'),
        'poto' => set_value('poto'),
      );

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/guru_form',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_guru_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_guru();
    }else{
      $poto = $_FILES['poto']['name'];
        if ($poto=''){
          echo "no photo uploaded";
          exit;
        }else{
          $config['upload_path'] = './assets/uploads/';
          $config['allowed_types'] = 'jpg|png|gif|tiff';

          $this->load->library('upload',$config);
          if(!$this->upload->do_upload('poto')){
            echo "Gagal Upload"; die();
          }else{
            $poto=$this->upload->data('file_name');
          }
        }

        $nama_guru     = $this->input->post('nama_guru');
        $nik           = $this->input->post('nik');
        $jalan    = $this->input->post('jalan');
        $kecamatan    = $this->input->post('kecamatan');
        $kota    = $this->input->post('kota');
        $provinsi    = $this->input->post('provinsi');
        $tempat_lahir  = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama         = $this->input->post('agama');
        $no_hp         = $this->input->post('no_hp');
        $status        = $this->input->post('status');

      $data = array(
        'nama_guru'      => $nama_guru,
        'nik'            => $nik,
        'jalan'          => $jalan,
        'kecamatan'      => $kecamatan,
        'kota'           => $kota,
        'provinsi'       => $provinsi,
        'tempat_lahir'   => $tempat_lahir,
        'tanggal_lahir'  => $tanggal_lahir,
        'jenis_kelamin'  => $jenis_kelamin,
        'agama'          => $agama,
        'no_hp'          => $no_hp,
        'status'         => $status,
        'poto'           => $poto
      );

      $this->guru_model->insert_data($data,'guru');
      $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru Berhasil di Tambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Guru');
    }
  }

  public function update($nik){
    $where = array('nik' => $nik);
    $data['guru'] = $this->guru_model->edit_data($where,'guru')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/guru_update',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_guru_aksi(){
      $nama_guru     = $this->input->post('nama_guru');
      $nik      = $this->input->post('nik');
      $jalan    = $this->input->post('jalan');
      $kecamatan    = $this->input->post('kecamatan');
      $kota    = $this->input->post('kota');
      $provinsi    = $this->input->post('provinsi');
      $tempat_lahir = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin  = $this->input->post('jenis_kelamin');
      $agama = $this->input->post('agama');
      $no_hp = $this->input->post('no_hp');
      $status = $this->input->post('status');
      $poto = $_FILES['userfile']['name'];
        if ($poto){
          $config['upload_path'] = './assets/uploads/';
          $config['allowed_types'] = 'jpg|png|gif|tiff';

          $this->load->library('upload',$config);

          if($this->upload->do_upload('userfile')){
            $userfile = $this->upload->data('file_name');
            $this->db->set('poto', $userfile);
          }else{
            echo "Gagal Upload";
          }
      }

      $data = array(
        'nama_guru'       => $nama_guru,
        'nik'             => $nik,
        'jalan'           => $jalan,
        'kecamatan'       => $kecamatan,
        'kota'            => $kota,
        'provinsi'        => $provinsi,
        'tempat_lahir'    => $tempat_lahir,
        'tanggal_lahir'   => $tanggal_lahir,
        'jenis_kelamin'   => $jenis_kelamin,
        'agama'           => $agama,
        'no_hp'           => $no_hp,
        'status'          => $status,
        'poto'            => $poto
      );

      $where = array(
        'nik' => $nik
      );

      $this->guru_model->update_data($where,$data,'guru');
      $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru Berhasil di Update!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Guru');
    }

  public function _rules(){
    $this->form_validation->set_rules('nama_guru','Nama','required|alpha',['required' => 'Nama Wajib di Isi!']);
    $this->form_validation->set_rules('nik','NIK','required|numeric|min_length[6]|max_length[8]',['required' => 'NIK Wajib di Isi!']);
    $this->form_validation->set_rules('jalan','Jalan','required',['required' => 'Jalan Wajib di Isi!']);
    $this->form_validation->set_rules('kecamatan','Kecamatan','required',['required' => 'Kecamatan Wajib di Isi!']);
    $this->form_validation->set_rules('kota','Kota','required',['required' => 'Kota Wajib di Isi!']);
    $this->form_validation->set_rules('provinsi','Provinsi','required',['required' => 'Provinsi Wajib di Isi!']);
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => 'Tempat Lahir Wajib di Isi!']);
    $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',['required' => 'Tanggal Lahir Wajib di Isi!']);
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => 'Jenis Kelamin Wajib di Isi!']);
    $this->form_validation->set_rules('agama','Agama','required',['required' => 'Agama Wajib di Isi!']);
    $this->form_validation->set_rules('no_hp','no_hp','required|numeric|min_length[12]|max_length[15]',['required' => 'Nomor Handphone Wajib di Isi!']);
    $this->form_validation->set_rules('status','Status','required',['required' => 'Status Wajib di Isi!']);
  }

  public function delete($nik){
    $where = array('nik' => $nik);
    $this->guru_model->hapus_data($where,'guru');
    $this->session->set_flashdata('pesan', 
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Guru Berhasil di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Guru');

  }

}
