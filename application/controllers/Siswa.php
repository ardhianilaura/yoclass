<?php 

class Siswa extends CI_Controller{
  private $filename = "import_data_siswa";

  public function __construct(){
    parent::__construct();

    $this->load->helper(array('url','download'));
  }

  public function index(){
    $data['siswa'] = $this->siswa_model->tampil_data();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar'); 
    $this->load->view('administrator/siswa',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function download_format(){
    force_download('format/import_data_siswa.xlsx',NULL);

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/import_data_siswa');
    $this->load->view('templates_administrator/footer');
  }

  public function form(){
    $data = array(); // Buat variabel $data sebagai array
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->siswa_model->upload_file($this->filename);
      
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
    $this->load->view('administrator/import_data_siswa',$data);
    $this->load->view('templates_administrator/footer');
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data_siswa = array();
    $data_ortu = array();

    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data_siswa, array(
          'nama_siswa'=>$row['A'],
          'nis'=>$row['B'],
          'kelas'=>$row['C'],
          'nama_guru'=>$row['D'],
          'status'=>$row['E'],
          'jalan'=>$row['F'],
          'kecamatan'=>$row['G'],
          'kota'=>$row['H'],
          'provinsi'=>$row['I'],
          'no_hp'=>$row['J'],
          'tempat_lahir'=>$row['K'],
          'tanggal_lahir'=>$row['L'],
          'jenis_kelamin'=>$row['M'],
          'agama'=>$row['N'],
          'poto'=>$row['O'],
        ));

        array_push($data_ortu, array(
            'nama_ayah'=>$row['P'],
            'pekerjaan_ayah'=>$row['Q'],
            'no_telp_ayah'=>$row['R'], 
            'nama_ibu'=>$row['S'], 
            'pekerjaan_ibu'=>$row['T'],
            'no_telp_ibu'=>$row['U'],
            'nama_wali'=>$row['V'],
            'no_telp_wali'=>$row['W'],
            'pekerjaan_wali'=>$row['X'],
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $result = $this->siswa_model->insert_multiple($data_siswa, $data_ortu);
    if($result != 1){
        $this->session->set_flashdata('pesan', 
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Siswa Gagal Diimport!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    } else {
        $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil Diimport! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    }
    
    redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
  
  public function detail($nis){
    $data['detail'] = $this->siswa_model->ambil_siswa_id($nis);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_detail',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function search(){
    $keyword = $this->input->post('keyword');
    $data['siswa']=$this->siswa_model->get_siswa_keyword($keyword);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function print(){
    $data['siswa'] = $this->siswa_model->query("SELECT * FROM `siswa` JOIN orang_tua")->result();
    $this->load->view('administrator/print_siswa', $data);
  }

  public function status(){
    $this->load->model('siswa_model');
    $status = $this->input->get('status');
    $data = $this->siswa_model->get_status($status);
    $data = array(
      'status'  => $status,
      'siswa'   => $data
    );
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_status',$data);
    $this->load->view('templates_administrator/footer');
  }

  function tambah_siswa_form()
  {
    $data['kelas'] = $this->siswa_model->get_data_kelas();
    $this->load->view('administrator/siswa_form', $data, FALSE);
  }

  public function tambah_siswa(){
    
    $data['kelas'] = $this->siswa_model->get_data_kelas();
    $data['nama_guru'] = $this->siswa_model->get_data_guru();

    // **
    // load form file
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_form',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_siswa_aksi(){
    $this->_rules();

    // **
    // if any error found
    if($this->form_validation->run() == FALSE){
      // **
      // repopulate the form
      $this->tambah_siswa();
    }else{ // if no error found, proceed here
        // **
        // evaluate file upload first to detect early error
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

        $nama_siswa   = $this->input->post('nama_siswa');
        $nis       = $this->input->post('nis');
        $kelas = $this->input->post('kelas');
        $nama_guru = $this->input->post('nama_guru');
        $status    = $this->input->post('status');
        $jalan    = $this->input->post('jalan');
        $kecamatan    = $this->input->post('kecamatan');
        $kota    = $this->input->post('kota');
        $provinsi    = $this->input->post('provinsi');
        $no_hp = $this->input->post('no_hp');
        $tempat_lahir  = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama = $this->input->post('agama');
        $nama_ayah = $this->input->post('nama_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $no_telp_ayah = $this->input->post('no_telp_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $no_telp_ibu = $this->input->post('no_telp_ibu');
        $nama_wali = $this->input->post('nama_wali');
        $no_telp_wali = $this->input->post('no_telp_wali');
        $pekerjaan_wali = $this->input->post('pekerjaan_wali');

      $data_ortu = array(
        'nama_ayah'       => $nama_ayah,
        'pekerjaan_ayah'  => $pekerjaan_ayah,
        'no_telp_ayah'    => $no_telp_ayah,
        'nama_ibu'        => $nama_ibu,
        'pekerjaan_ibu'   => $pekerjaan_ibu,
        'no_telp_ibu'     => $no_telp_ibu,
        'nama_wali'       => $nama_wali,
        'no_telp_wali'    => $no_telp_wali,
        'pekerjaan_wali'  => $pekerjaan_wali
      );


      $id_ortu = $this->siswa_model->insert_data_ortu($data_ortu);
      $data = array(
        'orang_tua_id'=> $id_ortu,
        'nama_siswa'      => $nama_siswa,
        'nis'             => $nis,
        'kelas'           => $kelas,
        'nama_guru'       => $nama_guru,
        'status'          => $status,
        'jalan'           => $jalan,
        'kecamatan'       => $kecamatan,
        'kota'            => $kota,
        'provinsi'        => $provinsi,
        'no_hp'           => $no_hp,
        'tempat_lahir'    => $tempat_lahir,
        'tanggal_lahir'   => $tanggal_lahir,
        'jenis_kelamin'   => $jenis_kelamin,
        'agama'           => $agama,
        'poto'            => $poto
      );
      $this->siswa_model->insert_data($data);
      $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil Ditambahkan! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Siswa');
    }
  }

  public function update($nis){
    $where = array('nis' => $nis);
    $data['siswa'] = $this->siswa_model->query("SELECT * FROM siswa LEFT OUTER JOIN orang_tua ON siswa.orang_tua_id=orang_tua.id WHERE nis='$nis'")->result();
    $data['detail'] = $this->siswa_model->ambil_siswa_id($nis);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/siswa_update',$data);
    $this->load->view('templates_administrator/footer');
  }

  public function update_siswa_aksi(){
      $nama_siswa     = $this->input->post('nama_siswa');
      $nis       = $this->input->post('nis');
      $orang_tua_id       = $this->input->post('orang_tua_id');
      $kelas = $this->input->post('kelas');
      $nama_guru = $this->input->post('nama_guru');
      $status   = $this->input->post('status');
      $jalan    = $this->input->post('jalan');
      $kecamatan    = $this->input->post('kecamatan');
      $kota    = $this->input->post('kota');
      $provinsi    = $this->input->post('provinsi');
      $no_hp = $this->input->post('no_hp');
      $tempat_lahir  = $this->input->post('tempat_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $agama = $this->input->post('agama');
      $nama_ayah = $this->input->post('nama_ayah');
      $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
      $no_telp_ayah = $this->input->post('no_telp_ayah');
      $nama_ibu = $this->input->post('nama_ibu');
      $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
      $no_telp_ibu = $this->input->post('no_telp_ibu');
      $nama_wali = $this->input->post('nama_wali');
      $no_telp_wali = $this->input->post('no_telp_wali');
      $pekerjaan_wali = $this->input->post('pekerjaan_wali');
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
        'nama_siswa'      => $nama_siswa,
        'nis'             => $nis,
        'kelas'           => $kelas,
        'nama_guru'       => $nama_guru,
        'status'          => $status,
        'jalan'           => $jalan,
        'kecamatan'       => $kecamatan,
        'kota'            => $kota,
        'provinsi'        => $provinsi,
        'no_hp'           => $no_hp,
        'tempat_lahir'    => $tempat_lahir,
        'tanggal_lahir'   => $tanggal_lahir,
        'jenis_kelamin'   => $jenis_kelamin,
        'agama'           => $agama,
        'poto'            => $poto
      );

      $data2 = array(
        'nama_ayah'       => $nama_ayah,
        'pekerjaan_ayah'  => $pekerjaan_ayah,
        'no_telp_ayah'    => $pekerjaan_ayah,
        'nama_ibu'        => $nama_ibu,
        'pekerjaan_ibu'   => $pekerjaan_ibu,
        'no_telp_ibu'     => $no_telp_ibu,
        'nama_wali'       => $nama_wali,
        'no_telp_wali'    => $no_telp_wali,
        'pekerjaan_wali'  => $pekerjaan_wali,
      );

      $where = array(
        'nis' => $nis
      );

      $where2 = array(
        'id' => $orang_tua_id
      );

      $this->siswa_model->update_data($where,$data,'siswa');
      $this->siswa_model->update_data($where2,$data2,'orang_tua');
      $this->session->set_flashdata('pesan', 
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil Diupdate! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Siswa');
    }
    
  public function _rules(){
    $this->form_validation->set_rules('nama_siswa','Nama','required|alpha',['required' => 'Nama Wajib di Isi!']);
    $this->form_validation->set_rules('nis','NIS','required|numeric|min_length[6]|max_length[6]',['required' => 'NIS Wajib di Isi!']);
    $this->form_validation->set_rules('kelas','Kelas','required',['required' => 'Kelas Wajib di Isi!']);
     $this->form_validation->set_rules('nama_guru','Nama Guru','required',['required' => 'Wali Kelas Wajib di Isi!']);
    $this->form_validation->set_rules('status','Status','required|alpha',['required' => 'Status Wajib di Isi!']);
    $this->form_validation->set_rules('jalan','Jalan','required',['required' => 'Jalan Wajib di Isi!']);
    $this->form_validation->set_rules('kecamatan','Kecamatan','required',['required' => 'Kecamatan Wajib di Isi!']);
    $this->form_validation->set_rules('kota','Kota','required',['required' => 'Kota Wajib di Isi!']);
    $this->form_validation->set_rules('provinsi','Provinsi','required',['required' => 'Provinsi Wajib di Isi!']);
    $this->form_validation->set_rules('no_hp','No Telepon','required|numeric|min_length[12]|max_length[15]',['required' => 'No Telepon Wajib di Isi!']);
    $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => 'Tempat Lahir Wajib di Isi!']);
    $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',['required' => 'Tanggal Lahir Wajib di Isi!']);
    $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => 'Jenis Kelamin Wajib di Isi!']);
    $this->form_validation->set_rules('agama','Agama','required',['required' => 'Agama Wajib di Isi!']);
    $this->form_validation->set_rules('nama_ayah','Nama Ayah','required',['required' => 'Nama Ayah Wajib di Isi!']);
    $this->form_validation->set_rules('pekerjaan_ayah','Pekerjaan Ayah','required',['required' => 'Pekerjaan Ayah Wajib di Isi!']);
    $this->form_validation->set_rules('no_telp_ayah','No Telepon Ayah','required|numeric|min_length[12]|max_length[15]',['required' => 'No Telepon Ayah Wajib di Isi!']);
    $this->form_validation->set_rules('nama_ibu','Nama Ibu','required',['required' => 'Nama Ibu Wajib di Isi!']);
    $this->form_validation->set_rules('pekerjaan_ibu','Pekerjaan Ibu','required',['required' => 'Pekerjaan Ibu Wajib di Isi!']);
    $this->form_validation->set_rules('no_telp_ibu','No Telepon Ibu','required|numeric|min_length[12]|max_length[15]',['required' => 'No Telepon Ibu Wajib di Isi!']);
  }

  public function delete($nis){
    $where = array('nis' => $nis);
    $this->siswa_model->hapus_data($where,'siswa');
    $this->session->set_flashdata('pesan', 
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Siswa Berhasil di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Siswa');
  }

}