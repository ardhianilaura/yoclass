<?php

class Kelas_model extends CI_Model{

	public function get_kelas_keyword($keyword){
		$this->db->select('*');
		$this->db->from('class');
		$this->db->like('kode_kelas',$keyword);
		$this->db->or_like('kelas',$keyword);
		return $this->db->get()->result();
	}

	public function tampil_data(){
		return $this->db->get('class');
	}

	public function input_data($data){
		$this->db->insert('class', $data);
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

}