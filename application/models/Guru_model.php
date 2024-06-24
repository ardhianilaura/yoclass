<?php 

class Guru_model extends CI_Model{

	public function tampil_data(){
		$query = $this->db->query("SELECT * FROM guru ORDER BY nama_guru ASC");

		return $query->result();
	}

	function ambil_guru_by_admin_id($guru_id)
    {
        $hasil = $this->db->where('admin_id', $guru_id)->get('guru');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

	public function get_guru_keyword($keyword){
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->like('nama_guru',$keyword);
		$this->db->or_like('jalan',$keyword);
		$this->db->or_like('kecamatan',$keyword);
		$this->db->or_like('kota',$keyword);
		$this->db->or_like('provinsi',$keyword);
		$this->db->or_like('tempat_lahir',$keyword);
		$this->db->or_like('tanggal_lahir',$keyword);
		$this->db->or_like('jenis_kelamin',$keyword);
		$this->db->or_like('agama',$keyword);
		$this->db->or_like('no_hp',$keyword);
		$this->db->or_like('status',$keyword);
		return $this->db->get()->result();
	}

	public function ambil_guru_id($nik){
		$hasil = $this->db->where('nik',$nik)->get('guru');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function insert_data($data){
		$this->db->insert('guru',$data);
	}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
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
            $data[$key]['admin_id'] = null;
            $this->db->insert('guru', $data[$key]);
        }
    }
}