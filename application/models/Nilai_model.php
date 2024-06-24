<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model{
	public function __construct(){
        parent::__construct();
    }

	public function ambil_data(){
		$this->db->join('guru', 'guru.nik=nilai.nik');
		$this->db->join('siswa', 'siswa.nis=nilai.nis');
		$this->db->join('mata_pelajaran', 'mata_pelajaran.kode_mapel=nilai.kode_mapel');
		return $this->db->get('nilai')->result();
	}

    public function ambil_tahun_akademik($keyword=null){
        $this->db->select('*');
        $this->db->from('nilai');
        if(!empty($keyword)){
            $this->db->where('tahun_akademik',$keyword);
        }
        return $this->db->get()->result_array();
    }

    public function ambil_semester($keyword=null){
        $this->db->select('*');
        $this->db->from('nilai');
        if(!empty($keyword)){
            $this->db->where('semester',$keyword);
        }
        return $this->db->get()->result_array();
    }

    public function get_nilai_keyword($keyword){
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->like('nis',$keyword);
        $this->db->or_like('nik',$keyword);
        $this->db->or_like('tanggal_akademik',$keyword);
        $this->db->or_like('semester',$keyword);
        $this->db->or_like('ulangan_harian',$keyword);
        $this->db->or_like('tugas',$keyword);
        $this->db->or_like('uts',$keyword);
        $this->db->or_like('uas',$keyword);
        $this->db->or_like('nilaiakhir',$keyword);
        $this->db->or_like('indek',$keyword);
        $this->db->or_like('evaluasi',$keyword);
        return $this->db->get()->result();
    }

	public function insert_data($data){
		$this->db->insert('nilai',$data);
	}

    public function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
    
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
  
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insert_multiple($data){
        foreach ($data as $key => $value) {
            $data[$key]['nilai_id'] = null;
            $this->db->insert('nilai', $data[$key]);
        }
    }

	function fetch_data_nis($query)
    {
        $this->db->like('nis', $query);
        $query = $this->db->get('siswa');
        
        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $row)
            {
                $output[] = array(
                    'nis'  => $row["nis"],
                    'nama_siswa'  => $row["nama_siswa"],
                    'display_data'  => $row["nis"]." - ". $row['nama_siswa']
                );
            }
            echo json_encode($output);
        }
    }
 
    function fetch_data_mapel($query)
    {
        $this->db->like('kode_mapel', $query);
        $query = $this->db->get('mata_pelajaran');
        
        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $row)
            {
                $output[] = array(
                    'kode_mapel'  => $row["kode_mapel"],
                    'mapel'  => $row["mapel"],
                    'display_data' => $row['kode_mapel']." - ". $row['mapel']
                );
            }
            echo json_encode($output);
        }
    }

}

?>