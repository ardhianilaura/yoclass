<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua_model extends CI_Model{
	public function __construct(){
        parent::__construct();
    }

	public function ambil_data($id){
		$this->db->where('nama_lengkap', $id);
		return $this->db->get('system_login')->row();
	}

	function ambil_ortu_by_admin_id($orang_tua_id)
    {
        $hasil = $this->db->where('orang_tua_id', $orang_tua_id)->get('siswa');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }
}

