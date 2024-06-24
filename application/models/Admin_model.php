<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	public function __construct(){
        parent::__construct();
    }

	public function ambil_data($id){
		$this->db->where('nama_lengkap', $id);
		return $this->db->get('system_login')->row();
	}
}