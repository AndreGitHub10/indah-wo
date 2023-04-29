<?php
	class Keranjang extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function index(){
			$data['q']  = $this->input->post('q');
			$data["pg"] = "keranjang";
			
			$this->template->load('template','daftar_keranjang',$data);
		}
		
		function simpan(){
			$idtransl=$this->M_data->data("tbl_transaksi",null,null,null,"id_transaksi","desc")->row()->id_transaksi;
			$idtransl=substr($idtransl,1,5)+1;
			if ($idtransl<10){$idtrans="T0000".$idtransl;}else
			if ($idtransl<100){$idtrans="T000".$idtransl;}else
			if ($idtransl<1000){$idtrans="T00".$idtransl;}else
			if ($idtransl<10000){$idtrans="T0".$idtransl;}else{$idtrans="T".$idtransl;}
			$data=array(
				"id_transaksi"=>$idtrans,
				"id_paket"=>$this->input->post("id_paket"),
				"id_pelanggan"=>$this->input->post("id_user"),
				"jumlah_harga"=>$this->input->post("harga"),
				"status"=>'1',
				"catatan"=>$this->input->post("catatan")
			);
			$this->M_proses->tambah("tbl_keranjang",$data);
			echo "<script>alert('paket berhasil dimasukkan ke keranjang');location.href='".base_url('keranjang')."'</script>";
		}
		
		function checkout(){
			$data=array(
			'id_transaksi'     => $this->input->post('id_transaksi'),
			'tgl_transaksi'    => date("Y-m-d"),
			'total_transaksi'  => $this->input->post('total_transaksi'),
			'id_prov'		       => $this->input->post('propinsi'),
			'id_kabkot'        => $this->input->post('kota'),
			'id_kec'           => $this->input->post('kec'),
			'catatan'          => $this->input->post('catatan'),
			'tgl_pembayaran'	 => null,
			'status'					 => 'Silahkan lakukan pembayaran selama 1x24 jam, jika tidak transaksi akan terhapus',
			'sisa_pembayaran'  => $this->input->post('total_transaksi'),
			'no_resi'					 => null,
			'bank'						 => null,
			'tgl_pernikahan'	 => $this->input->post('tgl_transaksi')
			);
			
			$this->M_proses->tambah("tbl_transaksi",$data);
			$this->M_proses->ubah("tbl_keranjang",array("status"=>0),array("id_transaksi"=>$this->input->post('id_transaksi')));
			echo "<script>alert('Transaksi Berhasil');location.href='".base_url('pemesanan')."'</script>";
		}
		
		function hapus($id){
			$this->M_proses->hapus("tbl_keranjang",array("id_keranjang"=>$id));
			echo "<script>alert('paket berhasil dihapus dari keranjang');location.href='".base_url('keranjang')."'</script>";
		}
	}
?>