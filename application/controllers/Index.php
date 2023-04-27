<?php
	class Index extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
		}
			
		function index($wo='wo',$ke=1,$cr=null){
			$data['q']  = $this->input->post('q');
			$data["judulapp"]	= "CI Selamat Datang";
			$data["dftwo"] = $this->M_data->data("tbl_wo",null,4,($ke-1)*4)->result();
			$data["tothal"]= ceil($this->M_data->data("tbl_wo")->num_rows()/4);
			$data["cr"]=$cr; $data["kehal"]=$ke;
			$data["pg"] = "beranda";
			
			$this->template->load('template','beranda',$data);
		}
		
		function tentang(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "tentang";
			
			$this->template->load('template','tentang',$data);
		}
		
		function kontak(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "kontak";
			
			$this->template->load('template','kontak',$data);
		}
		
		function login(){
			$whr=array("email"=>$this->input->post("email"),"password"=>aoc_enc($this->input->post("password")));
			if ($this->M_data->data("tbl_wo",$whr)->num_rows()>0){
				$dt=$this->M_data->data("tbl_wo",$whr)->row();
				$ssar=array(
					aoc_enc("UserID")=>$dt->id_wo,
					aoc_enc("Nama")=>$dt->nama_wo,
					aoc_enc("Level")=>$dt->level
				);
				$this->session->set_userdata($ssar);
				echo "<script>alert('Selamat anda berhasil Login..');location.href='".base_url()."'</script>";
			}else if($this->M_data->data("tbl_pelanggan",$whr)->num_rows()>0){
				$dt=$this->M_data->data("tbl_pelanggan",$whr)->row();
				$ssar=array(
					aoc_enc("UserID")=>$dt->id_pelanggan,
					aoc_enc("Nama")=>$dt->nama_pelanggan,
					aoc_enc("Level")=>$dt->level
				);
				$this->session->set_userdata($ssar);
				echo "<script>alert('Selamat anda berhasil Login..');location.href='".base_url()."'</script>";
			}else{
				echo "<script>alert('Login gagal, Email atau Password anda tidak cocok..');location.href='".base_url()."'</script>";
			}
		}
		
		function daftar($tp){
			$data['q']  = $tp;
			$data["pg"] = "daftar";
			
			$this->template->load('template','daftar',$data);
		}
		function pros_daftar($tp){
			if ($tp=="wo"){
				$dir		 = "foto/wo/";
				$newname = "foto".date("YMDHis");
				//inisialisasi & proses upload
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'jpg|gif|png';
				$config['max_size']     = '10000';
				$config['max_width'] = '4208';
				$config['max_height'] = '4208';
				$config['file_name'] = $newname;
				//upload
				$this->load->library('upload', $config);
				if ($_FILES["foto"]["name"]!='' or $_FILES["foto"]["name"]!=null){
					if ($this->upload->do_upload('foto')){
						$fname=$this->upload->file_name;
					}
				}else{$fname='';}
				$data=array(
					"nama_pemilik" => $this->input->post('nama_pemilik'),
					"nama_wo"      => $this->input->post('nama_wo'),
					"deskripsi_wo" => $this->input->post('deskripsi_wo'),
					"telp_wo"      => $this->input->post('telp_wo'),
					"alamat_wo"    => $this->input->post('alamat_wo'),
					"rek_wo"       => $this->input->post('rek_wo'),
					"atas_nama"    => $this->input->post('atas_nama'),
					"email"        => $this->input->post('email'),
					"password" 	   => aoc_enc(trim($this->input->post('password1'))),
					"foto"				 => $fname,
					"map"    	     => $this->input->post('map'),
					"level"				 => '2',
					"status"			 => 'wo'
				);
				$this->M_proses->tambah("tbl_wo",$data);
			}else{
				$dir		 = "foto/pelanggan/";
				$newname = "foto".date("YMDHis");
				//inisialisasi & proses upload
				$config['upload_path'] 	 = $dir;
				$config['allowed_types'] = 'jpg|gif|png';
				$config['max_size']      = '10000';
				$config['max_width'] 		 = '4208';
				$config['max_height'] 	 = '4208';
				$config['file_name'] 		 = $newname;
				//upload
				$this->load->library('upload', $config);
				if ($_FILES["foto"]["name"]!='' or $_FILES["foto"]["name"]!=null){
					if ($this->upload->do_upload('foto')){
						$fname=$this->upload->file_name;
					}
				}else{$fname='';}
				$data=array(
					"nama_pelanggan" => $this->input->post('nama_pelanggan'),
					"no_telp"      => $this->input->post('no_telp'),
					"alamat"    	 => $this->input->post('alamat'),
					"email"        => $this->input->post('email'),
					"password" 	   => aoc_enc(trim($this->input->post('password1'))),
					"foto"				 => $fname,
					"level"				 => '1'
				);
				$this->M_proses->tambah("tbl_pelanggan",$data);
			}
			echo "<script>alert('Selamat anda berhasil terdaftar, Silahkan melakukan Login..');location.href='".base_url()."'</script>";
			//redirect(base_url());
		}
		function cek_mail($mail){
			if ($this->M_data->data("tbl_pelanggan",array("email"=>str_replace("%10","@",$mail)))->num_rows()>0){echo 1;}else{echo $this->M_data->data("tbl_wo",array("email"=>str_replace("%10","@",$mail)))->num_rows();}
		}
		
		function profil(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "Profil";
			
			$this->template->load('template','profil',$data);
		}
		
		function ubahprofil($us,$id){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "Ubah Profil";
			if ($us=="wo"){
				$data['dtprof']=$this->M_data->data("tbl_wo",array("id_wo"=>$id))->row();
				$this->template->load('template','edit_profil_wo',$data);
			}else{
				$data['dtprof']=$this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$id))->row();
				$this->template->load('template','edit_profil',$data);
			}
			
		}
		
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
?>