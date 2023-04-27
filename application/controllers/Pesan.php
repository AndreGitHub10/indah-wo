<?php
	class Pesan extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index(){
			$data['q']  = $this->input->post('q');
			$data["dftwo"] = $this->M_data->data("tbl_wo")->result();
			$data["pg"] = "pesan";
			
			$this->template->load('template','pesan_wo',$data);
		}
		
		function daftar(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "pesan";
			$data["iduser"]=$this->session->userdata(aoc_enc("UserID"));
			
			$this->template->load('template','daftar_pesan',$data);
		}
		
		function detail($id){
			$data["idpsn"]=$id;
			$data['q']  = $this->input->post('q');
			$data["pg"] = "pesan";
			//$data["iduser"]=$this->session->userdata(aoc_enc("UserID"));
			
			$this->template->load('template','detail_pesan',$data);
		}
		
		function kirim($id){
			$data=array(
				"id_user"=>$this->session->userdata(aoc_enc("UserID")),
				"id_wo"=>$id,
				"tgl_pesan"=>$this->input->post("tgl_pesan"),
				"judul"=>$this->input->post("judul"),
				"pesan"=>$this->input->post("pesan")
			);
			
			$this->M_proses->tambah("tbl_pesan",$data);
			echo "<script>alert('pesan berhasil dikirim');location.href='".base_url('pesan/daftar')."'</script>";
		}
		
		function balas(){
			if ($this->input->post("level")=='1'){$tmp='pelanggan';}else{$tmp='wo';}
			$idpsn=$this->input->post("id_pesan");
			$data=array(
				"id_pesan"=>$idpsn,
				"tgl_balasan"=>$this->input->post("tgl_balasan"),
				"pesan"=>$this->input->post("pesan"),
				"status"=>$this->input->post("level"),
				"tampil"=>$tmp
			);
			
			$this->M_proses->tambah("tbl_balasan",$data);
			echo "<script>alert('balas pesan berhasil dikirim');location.href='".base_url('pesan/detail').'/'.$idpsn."'</script>";
		}
		
		function hapus($id){
			$this->M_proses->hapus("tbl_balasan",array("id_pesan"=>$id));
			$this->M_proses->hapus("tbl_pesan",array("id_pesan"=>$id));
			echo "<script>alert('pesan berhasil dihapus');location.href='".base_url('pesan/daftar')."'</script>";
		}
	}
?>