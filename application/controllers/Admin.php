<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin extends CI_Controller {
		
		public function index(){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Halaman Utama";
			$data["deshal"] = "";
			$data["mnuact"] = "brd";
			
			$this->template->load('admin/template2','admin/beranda',$data);
		}
		
		function hal($nm=null,$ke=1){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Data Tabel";
			$data["deshal"] = "";
			$data["mnuact"] = $nm;
			
			if ($nm!=null){
				$data["tabel"] = $this->M_data->data("master_tbl",array("nama_tbl"=>("tbl_".$nm)))->row();
				//$data["tabel"] = $this->db->field_data(aoc_des($nm));
				$data["dtbl"] = $this->M_data->data(("tbl_".$nm),null,10,(($ke-1)*10))->result();
				$data["tothal"]= ceil($this->M_data->data(("tbl_".$nm))->num_rows()/10);
				$data["nmtbl"] = ("tbl_".$nm);
				$this->template->load('admin/template2','admin/tabel',$data);
			}else{redirect(base_url("admin"));}
		}
		
		function rinci($nmtbl,$rjk1){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Rincian Data";
			$data["deshal"] = "";
			$data["mnuact"] = 'rinci';
			$data["nmtbl"]	= $nmtbl;
			
			$fldtbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$nmtbl))->row()->tabel);
			foreach($fldtbl as $k=>$v){if($v->pk=='Y'){$whr[$k]=$rjk1;}}
			$data["rcndata"]= $this->M_data->data($nmtbl,$whr)->row();
			
			$this->template->load('admin/template2','admin/rinci',$data);
		}
		
		function transaksi($id=null,$stt=null,$ttl_trn=null){
			if ($stt!=null){$this->M_proses->ubah("tbl_transaksi",array("status"=>$stt),array("id_transaksi"=>$id));}
			if ($stt=='Lunas'){
				$this->M_proses->ubah("tbl_transaksi",array("status"=>$stt,"jumlah_dp"=>$ttl_trn,"sisa_pembayaran"=>""),array("id_transaksi"=>$id));
			}
			
			//cek transaksi lewat 1 hari
			$dt1=$this->db->query("SELECT * FROM tbl_transaksi WHERE status != 'Lunas'")->result();
			foreach($dt1 as $r){
        $idtrans = $r->id_transaksi;

        $tgl2           = substr($r->tgl_transaksi,0,10);
        $sekarang       = date('Y-m-d');
        $pengurangan    = $this->db->query("SELECT DATEDIFF('$sekarang','$tgl2') AS pengurangan")->row()->pengurangan;
        if ($pengurangan>=1){
          $this->M_proses->hapus("tbl_transaksi",array("id_transaksi"=>$idtrans));
          $this->M_proses->hapus("tbl_keranjang",array("id_transaksi"=>$idtrans));
        }
			}
			//----
			
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Transaksi WO";
			$data["deshal"] = "";
			$data["mnuact"] = 'transaksi';
			
			$data["dtrans"]	= $this->M_data->data("tbl_transaksi",array("id_transaksi"=>$id))->result();
			
			$this->template->load('admin/template2','admin/data_transaksi',$data);
		}

		function update_transaksi($id=null,$total_transaksi=null){
			$dtold=$this->M_data->data("tbl_transaksi",array("id_transaksi"=>$id))->result();
			// $dtold["jumlah_dp"] = $this->input->post("jumlah_dp");
			if($this->input->post("jumlah_dp") > $total_transaksi) {
				$alert_info=array("alert_jns"=>'warning',"alert_jdl"=>"<i class='fa fa-close'></i> Gagal.!!","alert_pesan"=>"<p>Data uang masuk lebih besar dari total pembayaran</p>");
				$this->session->set_flashdata($alert_info);
				redirect(base_url('admin/transaksi/'));
			} else {

				$this->M_proses->ubah("tbl_transaksi",array("jumlah_dp"=>$this->input->post("jumlah_dp"),"sisa_pembayaran"=>($total_transaksi - $this->input->post("jumlah_dp"))),array("id_transaksi"=>$id));

				$data["jdlapp"]	= "Wedding Organizer";
				$data["jdlhal"] = "Transaksi WO";
				$data["deshal"] = "";
				$data["mnuact"] = 'transaksi';

				$data["dtrans"]	= $this->M_data->data("tbl_transaksi")->result();
				$alert_info=array("alert_jns"=>'success',"alert_jdl"=>"<i class='fa fa-check-square-o'></i> Success.!!","alert_pesan"=>"<p>Data uang masuk berhasil di update</p>");
				$this->session->set_flashdata($alert_info);
				redirect(base_url('admin/transaksi/'));
				// $this->template->load('admin/template2','admin/data_transaksi',$data);
			}
		}
		
		function laporan(){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Laporan WO";
			$data["deshal"] = "";
			$data["mnuact"] = 'laporan';
			
			$this->template->load('admin/template2','admin/lap_wo',$data);
		}
		
		function detail_paket($id){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Detail Transaksi";
			$data["deshal"] = "";
			$data["mnuact"] = array('','active','','','','','','','');
			
			$data["dtlpms"]=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_kategori
                  WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                  AND tbl_paket.id_kategori=tbl_kategori.id_kategori 
                  AND tbl_keranjang.id_transaksi='$id'")->result();
			
			
			$this->template->load('admin/template2','admin/detail_pemesanan',$data);
		}
		
		function cetak($tp,$tgl1=null,$tgl2=null){
			if ($tp=='pms'){
				if ($tgl1==null){
					$data["dt1"]=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_transaksi
                               WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                               AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                               GROUP BY tbl_keranjang.id_transaksi
                               ORDER BY tbl_transaksi.id_transaksi DESC")->result();
				}else{
					$tgl1=date("Y-m-d",strtotime($tgl1));
					$tgl2=date("Y-m-d",strtotime($tgl2));
				
					$data["dt1"]=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_transaksi
                               WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                               AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                               AND tbl_transaksi.tgl_transaksi 
                               BETWEEN '$tgl1' AND '$tgl2'
                               GROUP BY tbl_keranjang.id_transaksi
                               ORDER BY tbl_transaksi.id_transaksi DESC")->result();
				}
				$this->load->view("admin/cetak_pemesanan",$data);
			}else if($tp=='wo'){
				$this->load->view("admin/cetak_wo");
			}else{
				if ($tgl1==null){
					$data["dt1"]=$this->db->query("SELECT *,SUM(tbl_keranjang.jumlah_beli) AS total,
                                       SUM(tbl_keranjang.jumlah_harga) AS total_harga 
                                       FROM tbl_keranjang,tbl_transaksi
                                       WHERE tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi")->result();
				}else{
					$tgl1=date("Y-m-d",strtotime($tgl1));
					$tgl2=date("Y-m-d",strtotime($tgl2));
				
					$data["dt1"]=$this->db->query("SELECT *,SUM(tbl_keranjang.jumlah_beli) AS total,
                                       SUM(tbl_keranjang.jumlah_harga) AS total_harga 
                                       FROM tbl_keranjang,tbl_transaksi
                                       WHERE tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                                       AND tbl_transaksi.tgl_transaksi 
                                       BETWEEN '$tgl1' AND '$tgl2'")->result();
				}
				$this->load->view("admin/cetak_terlaris",$data);
			}
		}
		
		function data_foto($id){
			$data["jdlapp"]	= "Wedding Organizer";
			$data["jdlhal"] = "Halaman Daftar Foto";
			$data["deshal"] = "";
			$data["mnuact"] = array('','active','','','','','','','');
			$data["dtfoto"] = $this->M_data->data("tbl_foto",array("id_paket"=>$id))->result();
			$data["idpkt"]=$id;
			
			$this->template->load('admin/template2','admin/data_foto',$data);
		}
		
		function login(){
			$data["jdlapp"]	= "WO || Login";
			$this->load->view('admin/login',$data);
		}
		
		function keluar(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
