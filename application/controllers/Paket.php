<?php
	class Paket extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index($kat='all',$idwo='0',$ke=1,$cr=null){
			$data['q']  = $this->input->post('q');
			$data["dftpaket"] = $this->M_data->data("tbl_wo",null,4,0)->result();
			$data["tothal"]= ceil($this->M_data->data("tbl_wo")->num_rows()/4);
			$data["allkat"]=$this->M_data->data("tbl_kategori")->result();
			$data["kat"]=$kat; $data["cr"]=$cr; $data["kehal"]=$ke; $data["idwo"]=$idwo;
			if ($idwo=="0"){
				$data["dtwo"]=null;
			}else{
				$data["dtwo"] = $this->M_data->data("tbl_wo",array("id_wo"=>$idwo))->row();
			}
			$data["pg"] = "daftar_paket";
			
			$this->template->load('template','daftar_paket',$data);
		}
		
		function rinci($id){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "daftar_paket";
			
			$data["rpaket"] = $this->M_data->data("tbl_paket",array("id_paket"=>$id))->row();
			
			$this->template->load('template','rinci_paket',$data);
		}
		
		function data_paket(){
			if ($this->session->userdata(aoc_enc("Level"))=='2'){
				$data['q']  = $this->input->post('q');
				$data["pg"] = "paketwo";
				$data["dtwo"]= $this->M_data->data("tbl_paket",array("id_wo"=>$this->session->userdata(aoc_enc("UserID"))))->result();
				
				$this->template->load('template','data_paket',$data);
			}else{redirect(base_url("paket"));}
		}
		
		function tambah(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "paketwo";
			
			$data["idpkt"] = null;
			
			$this->template->load('template','form_paket',$data);
		}
		function ptambah(){
			$hrg=$this->input->post("harga");
			$dsk=$this->input->post("diskon");
			$toth=$hrg-($hrg*$dsk);
			$data=array(
				"id_wo"=>$this->session->userdata(aoc_enc("UserID")),
				"id_kategori"=>$this->input->post("id_kategori"),
				"tgl_paket"=> date("Y-m-d"),
				"nama_paket"=>$this->input->post("nama_paket"),
				"harga"=>$hrg,
				"diskon"=>$dsk,
				"total_harga"=>$toth,
				"rincian"=>$this->input->post("rincian")
			);
			$this->M_proses->tambah("tbl_paket",$data);
			echo "<script>alert('paket berhasil ditambah');location.href='".base_url('paket/data_paket')."'</script>";
		}
		
		function edit($id){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "paketwo";
			
			$data["idpkt"] = $id;
			
			$this->template->load('template','form_paket',$data);
		}
		function pedit($id){
			$hrg=$this->input->post("harga");
			$dsk=$this->input->post("diskon");
			$toth=$hrg-($hrg*$dsk);
			$data=array(
				"id_wo"=>$this->session->userdata(aoc_enc("UserID")),
				"id_kategori"=>$this->input->post("id_kategori"),
				"tgl_paket"=> date("Y-m-d"),
				"nama_paket"=>$this->input->post("nama_paket"),
				"harga"=>$hrg,
				"diskon"=>$dsk,
				"total_harga"=>$toth,
				"rincian"=>$this->input->post("rincian")
			);
			$this->M_proses->ubah("tbl_paket",$data,array("id_paket"=>$id));
			echo "<script>alert('paket berhasil diubah');location.href='".base_url('paket/data_paket')."'</script>";
		}
		
		function hapus($id){
			$this->M_proses->hapus("tbl_paket",array("id_paket"=>$id));
			echo "<script>alert('paket berhasil dihapus');location.href='".base_url('paket/data_paket')."'</script>";
		}
	}
?>