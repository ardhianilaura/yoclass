<?php

class Mapel_model extends CI_Model{

	public function tampil_data(){
		return $this->db->get('mata_pelajaran');
	}

	public function get_mapel_keyword($keyword){
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->like('kode_mapel',$keyword);
		$this->db->or_like('mapel',$keyword);
		$this->db->or_like('jp',$keyword);
		return $this->db->get()->result();
	}


	public function input_data($data){
		$this->db->insert('mata_pelajaran', $data);
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

	public $table = 'mata_pelajaran';
	public $id = 'kode_mapel';

	public function get_by_id($id){
		$this->db->where('kode_mapel',$id);
		return $this->db->get($this->table)->row();
	}
}