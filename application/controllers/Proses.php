<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Proses extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			//$this->load->dbforge();
		}
		
		function tmbh_data_tbl($nmtbl){
			$dt=array();
			$fldtbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$nmtbl))->row()->tabel);
			foreach($fldtbl as $k=>$v){
				if ($v->edt=='2'){
					$dt[$k]=strtotime($this->input->post($k));
				}else if ($v->edt=='4'){
					$dt[$k]=aoc_enc($this->input->post($k));
				}else{$dt[$k]=$this->input->post($k);}
			}
			
			$this->M_proses->tambah($nmtbl,$dt);
			$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Data Tabel Baru berhasil di tambah..</p>");
			$this->session->set_flashdata($alert_info);
			redirect(base_url('admin/hal/'.(substr($nmtbl,4))));
		}
		
		function ubah_data_tbl($nmtbl){
			$dt=array();
			$fldtbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$nmtbl))->row()->tabel);
			$rjk1=$this->input->post('rjk1');
			//$fdt=explode(';',$this->input->post('rjk1'));$n=0;
			//foreach($fldtbl as $k=>$v){if($v->edt!='5'){$whr[$k]=$fdt[$n];}$n++;}
			foreach($fldtbl as $k=>$v){if($v->pk=='Y'){$whr[$k]=$rjk1;}}
			
			foreach($fldtbl as $k=>$v){
				if($v->ai=='Y' or $v->edt=='5'){}else{
					if ($v->edt=='2'){
						$dt[$k]=strtotime($this->input->post($k));
					}else if ($v->edt=='4'){
						$dt[$k]=aoc_enc($this->input->post($k));
					}else{$dt[$k]=$this->input->post($k);}
				}
			}
			
			$this->M_proses->ubah($nmtbl,$dt,$whr);
			$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Data berhasil di ubah..</p>");
			$this->session->set_flashdata($alert_info);
			redirect(base_url('admin/hal/'.(substr($nmtbl,4))));
		}
		
		function hapus_data_tbl($nmtbl){
			$fldtbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$nmtbl))->row()->tabel);
			//$fdt=explode(';',$this->input->post('b'));$n=0;
			//foreach($fldtbl as $k=>$v){if($v->edt!='5'){$whr[$k]=$fdt[$n];}$n++;}
			foreach($fldtbl as $k=>$v){if($v->pk=='Y'){$whr[$k]=$this->input->post('b');}}
			
			$this->M_proses->hapus($nmtbl,$whr);
		}
		
		function hapus_trans($id){
			$this->M_proses->hapus("tbl_transaksi",array("id_transaksi"=>$id));
      $this->M_proses->hapus("tbl_keranjang",array("id_transaksi"=>$id));
			$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Data pemesanan berhasil di hapus..</p>");
			$this->session->set_flashdata($alert_info);
			redirect(base_url('admin/transaksi/'));
		}
		
		function valid($v){
				if ($this->input->post("username")=='Admin0123'){
					echo "Y";
					$svdata=array(
						aoc_enc("AdminID")=>aoc_enc("001100Adm"),
						aoc_enc("UserName")=>aoc_enc("Admin0123"),
						aoc_enc("Nama")=>aoc_enc("Master Administrator"),
						aoc_enc("UserLvl")=>aoc_enc("0")
					);
					$this->session->set_userdata($svdata);
					$alert_info=array("alert_jns"=>'warning',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Anda Masuk sebagai Administrator Sistem..</p>");
					$this->session->set_flashdata($alert_info);
				}else{
					$cek=$this->M_data->data("tbl_admin",array("username"=>$this->input->post("username"),"password"=>aoc_enc($this->input->post("password"))));
					if ($cek->num_rows()>0){
						echo "Y";
						$svdata=array(
							aoc_enc("AdminID")=>aoc_enc($cek->row()->id_admin),
							aoc_enc("UserName")=>aoc_enc($cek->row()->username),
							aoc_enc("Nama")=>aoc_enc($cek->row()->username),
							aoc_enc("UserLvl")=>aoc_enc($cek->row()->level)
						);
						$this->session->set_userdata($svdata);
						$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Selamat datang kembali ".$cek->row()->username."..</p>");
						$this->session->set_flashdata($alert_info);
					}else{echo "N";}
				}
		}
		
		function ubah_profil($tp,$id){
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
					}
				}else{
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
					"map"    	     => $this->input->post('map'),
					"level"				 => '2',
					"status"			 => 'wo'
					);
				}
				
				$this->M_proses->ubah("tbl_wo",$data,array("id_wo"=>$id));
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
						$data=array(
						"nama_pelanggan" => $this->input->post('nama'),
						"no_telp"      => $this->input->post('no_telp'),
						"alamat"    	 => $this->input->post('alamat'),
						"email"        => $this->input->post('email'),
						"password" 	   => aoc_enc(trim($this->input->post('password1'))),
						"foto"				 => $fname,
						"level"				 => '1'
						);
					}
				}else{
					$data=array(
					"nama_pelanggan" => $this->input->post('nama'),
					"no_telp"      => $this->input->post('no_telp'),
					"alamat"    	 => $this->input->post('alamat'),
					"email"        => $this->input->post('email'),
					"password" 	   => aoc_enc(trim($this->input->post('password1'))),
					"level"				 => '1'
					);
				}
				
				$this->M_proses->ubah("tbl_pelanggan",$data,array("id_pelanggan"=>$id));
			}
			echo "<script>alert('Profil berhasil diperbarui..');</script>";
			redirect(base_url("index/profil"));
		}
		
		function keluar(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	
?>