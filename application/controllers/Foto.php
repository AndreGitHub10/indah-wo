<?php
	class Foto extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index($id){
			$data['q']  = $this->input->post('q');
			$data["dtfoto"] = $this->M_data->data("tbl_foto",array("id_paket"=>$id))->result();
			$data["pg"] = "paketwo";
			
			$this->template->load('template','data_foto',$data);
		}
		
		function data_foto($id){
			if (!$this->session->has_userdata(aoc_enc('AdminID'))){
			$data['q']  = $this->input->post('q');
			$data["dtfoto"] = $this->M_data->data("tbl_foto",array("id_paket"=>$id))->result();
			$data["pg"] = "paketwo";
			$data["idpkt"]=$id;
			
			$this->template->load('template','data_foto',$data);
			}else{redirect(base_url('admin/data_foto/'.$id));}
		}
		
		function tambah($id){
			$dir		 = "foto/paket/";
			$newname = "foto".date("YMDHis");
			
			//inisialisasi & proses upload
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']     = '10000';
				$config['max_width'] = '4208';
				$config['max_height'] = '4208';
				$config['file_name'] = $newname;
				//upload
				$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('foto')){
				$data=array("id_paket"=>$id,"foto"=>$this->upload->file_name);
				$this->M_proses->tambah("tbl_foto",$data);
				echo "<script>alert('Foto Paket berhasil ditambah');location.href='".base_url('foto/data_foto/'.$id)."'</script>";
			}else{
				echo "<script>alert('Gagal Mengupload.!!');location.href='".base_url('foto/data_foto/'.$id)."'</script>";
			}
		}
		
		function ubah($id,$idp){
			$dir		 = "foto/paket/";
			$newname = "foto".date("YMDHis");
			
			//inisialisasi & proses upload
				$config['upload_path'] = $dir;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']     = '10000';
				$config['max_width'] = '4208';
				$config['max_height'] = '4208';
				$config['file_name'] = $newname;
				//upload
				$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('foto')){
				//hapus
				unlink($dir.$this->M_data->data("tbl_foto",array("id_foto"=>$id))->row()->foto);
				//ubah database
				$data=array("foto"=>$this->upload->file_name);
				$this->M_proses->ubah("tbl_foto",$data,array("id_foto"=>$id));
				echo "<script>alert('Foto Paket berhasil diubah');location.href='".base_url('foto/data_foto/'.$idp)."'</script>";
			}else{
				echo "<script>alert('Gagal Mengupload.!!');location.href='".base_url('foto/data_foto/'.$idp)."'</script>";
			}
		}
		
		function hapus($id,$idp){
			$dir		 = "foto/paket/";
			unlink($dir.$this->M_data->data("tbl_foto",array("id_foto"=>$id))->row()->foto);
			$this->M_proses->hapus("tbl_foto",array("id_foto"=>$id));
			echo "<script>alert('pesan berhasil dihapus');location.href='".base_url('foto/data_foto/'.$idp)."'</script>";
		}
	}
?>