<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model{  

	public function tampil_data(){
		$query = $this->db->query("SELECT * FROM siswa ORDER BY nama_siswa ASC");

		return $query->result();
		
	}

	public function tampil_print(){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('orang_tua', 'orang_tua.id = siswa.orang_tua_id', 'left');
		$query = $this->db->get();
	} 

	public function get_siswa_keyword($keyword){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('orang_tua', 'orang_tua.id = siswa.orang_tua_id');
		$this->db->like('nama_siswa',$keyword);
		$this->db->or_like('nis',$keyword);
		$this->db->or_like('kelas',$keyword);
		$this->db->or_like('nama_guru',$keyword);
		$this->db->or_like('status',$keyword);
		$this->db->or_like('jalan',$keyword);
		$this->db->or_like('kecamatan',$keyword);
		$this->db->or_like('kota',$keyword);
		$this->db->or_like('provinsi',$keyword);
		$this->db->or_like('no_hp',$keyword);
		$this->db->or_like('tempat_lahir',$keyword);
		$this->db->or_like('tanggal_lahir',$keyword);
		$this->db->or_like('jenis_kelamin',$keyword);
		$this->db->or_like('agama',$keyword);
		$this->db->or_like('nama_ayah',$keyword);
		$this->db->or_like('pekerjaan_ayah',$keyword);
		$this->db->or_like('no_telp_ayah',$keyword);
		$this->db->or_like('nama_ibu',$keyword);
		$this->db->or_like('pekerjaan_ibu',$keyword);
		$this->db->or_like('no_telp_ibu',$keyword);
		$this->db->or_like('nama_wali',$keyword);
		$this->db->or_like('no_telp_wali',$keyword);
		$this->db->or_like('pekerjaan_wali',$keyword);
		return $this->db->get()->result();
	}

 
	public function ambil_siswa_id($nis){
		$this->db->from('siswa');
		$this->db->join('orang_tua', 'orang_tua.id = siswa.orang_tua_id', 'left');
		$this->db->where('nis',$nis);
		$hasil = $this->db->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
			}
		}

	function ambil_siswa_by_admin_id($admin_id)
    {
        $hasil = $this->db->where('admin_id', $admin_id)->get('siswa');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function get_status($keyword=null){
		$this->db->select('*');
		$this->db->from('siswa');
		if(!empty($keyword)){
			$this->db->where('status',$keyword);
		}
		return $this->db->get()->result_array();
	}

	public function insert_data($data){
		$this->db->insert('siswa',$data);
	}

	public function insert_data_ortu($data){
		$this->db->insert('orang_tua',$data);
		return $this->db->insert_id();
	}

	public function get_data_kelas(){
		return $this->db->get('class')->result();
	}

	public function get_data_guru(){
		return $this->db->get('guru')->result();
	}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function query($query){
        return $this->db->query($query);
    }

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public $table = 'siswa';
	public $siswa_id = 'nis';

	public function get_by_id($siswa_id){
		$this->db->where('nis',$siswa_id);
		return $this->db->get('siswa')->row();
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

    public function insert_multiple($data_siswa, $data_ortu){        
        //$this->db->trans_start();
        foreach ($data_ortu as $key => $value) {
            // insert data ortu ke table orang_tua
            $data_ortu[$key]['system_login_id'] = null; // set default value for system_login_id column
            $this->db->insert('orang_tua', $data_ortu[$key]);
            $orang_tua_id = $this->db->insert_id();

            // insert data siswa to siswa table
            $data_siswa[$key]['admin_id'] = null;
            $data_siswa[$key]['orang_tua_id'] = $orang_tua_id;
            $this->db->insert('siswa', $data_siswa[$key]);
        }

       // $this->db->trans_complete();

        // if db transaction error, rollback changes, then return 0
        if($this->db->trans_status() === FALSE){
           // $this->db->rollback();
            return 0;
        }
        // commit the changes, then return 1
       // $this->db->trans_commit();
        return 1;
    }
}