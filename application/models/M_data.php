<?php
	class M_data extends CI_Model {
			
		function data($tbl,$whr=null,$lmt=null,$offs=null,$odf=null,$ad=null,$odf2=null,$ad2=null){
			if ($whr!=null){$this->db->where($whr);}
			if ($odf!=null){$this->db->order_by($odf,$ad);}
			if ($odf2!=null){$this->db->order_by($odf2,$ad2);}
			if ($lmt!=null and ($offs!=null or $offs==0)){
				$hsl=$this->db->get($tbl,$lmt,$offs);
			}else{$hsl=$this->db->get($tbl);}
			return $hsl;
		}
		
		function cari($tbl,$whr,$nor='and',$lmt=null,$offs=null,$odf=null,$ad=null,$odf2=null,$ad2=null){
			if ($nor=='and'){$this->db->like($whr);}else{$this->db->or_like($whr);}
			if ($odf!=null){$this->db->order_by($odf,$ad);}
			if ($odf2!=null){$this->db->order_by($odf2,$ad2);}
			if ($lmt!=null and ($offs!=null or $offs==0)){
				$hsl=$this->db->get($tbl,$lmt,$offs);
			}else{$hsl=$this->db->get($tbl);}
			return $hsl;
		}
	}
?>