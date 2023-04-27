<?php
	class M_proses extends CI_Model {
	
		function tambah($tbl,$data){
			$this->db->insert($tbl, $data);
		}
		function ubah($tbl,$data,$whr){
			$this->db->where($whr);
			$this->db->update($tbl, $data);
		}
		function hapus($tbl,$whr){
			$this->db->where($whr);
			$this->db->delete($tbl);
		}
		
		function validasi(){
			if (!$this->session->has_userdata(aoc_enc('AdminID'))){redirect(base_url('admin/login'));}
		}
	}
?>