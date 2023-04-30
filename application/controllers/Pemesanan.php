<?php
	class Pemesanan extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index(){
			$data['q']  = $this->input->post('q');
			
			$idus=$this->session->userdata(aoc_enc("UserID"));
			if ($this->session->userdata(aoc_enc("Level"))=='1'){
				$data["dtpms"]=$this->db->query("SELECT tbl_paket.*,tbl_transaksi.* 
                                FROM tbl_paket,tbl_keranjang,tbl_transaksi 
                                WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                                AND tbl_keranjang.id_pelanggan='$idus'
                                AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                                GROUP BY tbl_keranjang.id_transaksi
                                ORDER BY tbl_transaksi.id_transaksi DESC")->result();
			}else{
				$data["dtpms"]=$this->db->query("SELECT tbl_paket.*,tbl_transaksi.* 
                                FROM tbl_paket,tbl_keranjang,tbl_transaksi 
                                WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                                AND tbl_paket.id_wo='$idus'
                                AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                                GROUP BY tbl_keranjang.id_transaksi
                                ORDER BY tbl_transaksi.id_transaksi DESC")->result();
			}
			$data["pg"] = "pemesanan";
			
			$this->template->load('template','daftar_pemesanan',$data);
		}
		
		function detail($id){
			$data['q']  = $id;
			$data["pg"] = "pemesanan";
			$data["dtlpms"]=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_kategori
                  WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                  AND tbl_paket.id_kategori=tbl_kategori.id_kategori 
                  AND tbl_keranjang.id_transaksi='$id'")->result();
			
			
			$this->template->load('template','detail_pemesanan',$data);
		}
		
		function up_bukti($id){
			$dir		 = "foto/bukti/";
			$newname = "foto".date("Y-M-D-His");
			//inisialisasi & proses upload
			$config['upload_path'] = $dir;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']     = '10000';
			$config['max_width'] = '4208';
			$config['max_height'] = '4208';
			$config['file_name'] = $newname;
			//upload
			$this->load->library('upload', $config);
			if ($_FILES["bukti"]["name"]!='' or $_FILES["bukti"]["name"]!=null){
				if ($this->upload->do_upload('bukti')){
					$fname=$this->upload->file_name;
					$dt=array("tgl_pembayaran"=>date("Y-m-d H:i:s"),"bukti_transaksi"=>$fname,"status"=>"Menunggu Konfirmasi Admin","bank"=>$this->input->post('bank'));
					$this->M_proses->ubah("tbl_transaksi",$dt,array("id_transaksi"=>$id));
					$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Bukti Pembayaran Berhasil di Upload..</p>");
				}else{$alert_info=array("alert_jns"=>'warning',"alert_jdl"=>'Gagal..!!',"alert_pesan"=>'<p>'.$this->upload->display_errors().'</p>');}
			}
			$this->session->set_flashdata($alert_info);
			redirect(base_url("pemesanan"));
		}

		function up_bukti_dp($id){
			$dir		 = "foto/bukti/";
			$newname = "foto".date("Y-M-D-His");
			//inisialisasi & proses upload
			$config['upload_path'] = $dir;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']     = '10000';
			$config['max_width'] = '4208';
			$config['max_height'] = '4208';
			$config['file_name'] = $newname;
			//upload
			$this->load->library('upload', $config);
			if ($_FILES["bukti"]["name"]!='' or $_FILES["bukti"]["name"]!=null){
				if ($this->upload->do_upload('bukti')){
					$fname=$this->upload->file_name;
					$dt=array("tgl_dp"=>date("Y-m-d H:i:s"),"bukti_dp"=>$fname,"status"=>"Menunggu Konfirmasi Admin","bank_dp"=>$this->input->post('bank'));
					$this->M_proses->ubah("tbl_transaksi",$dt,array("id_transaksi"=>$id));
					$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Bukti Pembayaran Berhasil di Upload..</p>");
				}else{$alert_info=array("alert_jns"=>'warning',"alert_jdl"=>'Gagal..!!',"alert_pesan"=>'<p>'.$this->upload->display_errors().'</p>');}
			}
			$this->session->set_flashdata($alert_info);
			redirect(base_url("pemesanan"));
		}
		
		function cetak($id){
			$data["dtrans"]=$this->M_data->data("tbl_transaksi",array("id_transaksi"=>$id))->row();
			
			$this->load->view('cetak_transaksi',$data);
		}

		function rate($id){
			$this->M_proses->ubah("tbl_transaksi",array("ulasan"=>$this->input->post("ulasan"),"tgl_ulasan"=>date("Y-m-d H:i:s"),"rating"=>$this->input->post("rating")),array("id_transaksi"=>$id));
			$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Ulasan anda berhasil di Upload..</p>");
			$this->session->set_flashdata($alert_info);
			redirect(base_url("pemesanan"));
		}
	}
?>