<?php
	class Mbantu extends CI_Controller {
		
		function __construct() {
			parent::__construct();
		}
		
		function invoice($id){
			$dt=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_transaksi,tbl_pelanggan
                      WHERE tbl_paket.id_paket=tbl_keranjang.id_paket 
                      AND tbl_keranjang.id_pelanggan=tbl_pelanggan.id_pelanggan
                      AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi 
                      AND tbl_transaksi.id_transaksi='$id'")->row();
			$total_transaksi = $dt->total_transaksi;
			$nama_pelanggan = $dt->nama_pelanggan;
			?>
				<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <img src="<?php echo base_url()?>assets/front-end/images/logo.png" width="30px" height="30px"> Wedding Organizer
                <small class="pull-right">Tanggal <?php echo date('Y-m-d')?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Dari
              <address>
                <strong>Admin</strong><br>
                Jl. Gajah Mada Rt:004 Rw:001 Dukuhsari-Jabon-Sidoarjo <br>
                Email: indahcollectionwedding@gmail.com

              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Kepada
              <address>
                <strong><?php echo $dt->nama_pelanggan?></strong><br> 
                Tujuan Pengiriman: 
                <?php 
                                    $id_prov    = $dt->id_prov;
                                    $id_kabkot  = $dt->id_kabkot;
                                    $id_kec     = $dt->id_kec;

                                    $nama_prov  = $this->M_data->data("tbl_prov",array("id_prov"=>$id_prov))->row()->nama_prov;

																		$dtkk=$this->M_data->data("tbl_kabkot",array("id_kabkot"=>$id_kabkot))->row();
                                    $nama_kabkot  = $dtkk->nama_kabkot;
                                    

                                    $nama_kec  = $this->M_data->data("tbl_kec",array("id_kec"=>$id_kec))->row()->nama_kec; 

                                    echo $nama_prov." - ".$nama_kabkot." - ".$nama_kec." - ".$dt->catatan;
                                ?><br> 
                Alamat: <?php echo $dt->alamat;?><br>
                Telp: <?php echo $dt->no_telp;?><br>
                Email: <?php echo $dt->email;?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #<?php echo substr($id,1,5) ?></b><br>
              <br> 
              <b>Pembayaran Sampai:</b> 
              <?php 
              $tgl1 = date('Y-m-d');
              echo $tgl2 = date('Y-m-d', strtotime('+1 days', strtotime($tgl1))); ?><br> 
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama paket</th>
                            <th>Kategori paket</th> 
                            <th>Harga</th> 
                            <th>Diskon</th> 
                            <th>Jumlah Harga</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
													$idpel=$dt->id_pelanggan;
                            $dt2 = $this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_kategori
                                                WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                                                AND tbl_paket.id_kategori=tbl_kategori.id_kategori
                                                AND tbl_keranjang.id_pelanggan='$idpel'
                                                AND tbl_keranjang.id_transaksi='$id'")->result();
                             
                            $no  = 1; $total=0;
                            foreach($dt2 as $r){  
                                $idpkt = $r->id_paket;
                            $foto = $this->M_data->data("tbl_foto",array("id_paket"=>$idpkt))->row()->foto;         
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $r->nama_paket?></td>
                            <td><?php echo $r->kategori?></td> 
                            <td><?php echo "Rp ".number_format($r->harga,0,",",".")?></td> 
                            <td><?php echo $r->diskon?> %</td> 
                            <td>
                                <?php
                                     echo "Rp ".number_format($r->jumlah_harga,0,",",".");
                                    $total          = $total + $r->jumlah_harga; 
                                    $status         = $r->status;
                                    $id_transaksi   = $r->id_transaksi;
                                ?>
                                    
                            </td>  
                        </tr>                                    
                        <?php
                            }
                        ?>       
                    </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">  
            </div><!-- /.col -->
          <div class="col-xs-6">
              <p class="lead"> </p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><b><?php echo "Rp. ".number_format($total_transaksi,0,",","."); ?></b></td>
                  </tr>
                    <th>Total:</th>
                    <td><b>
                      <?php
                         $totalnya = $total_transaksi;
                         echo "Rp. ".number_format($totalnya,0,",",".");
                      ?></b>
                    </td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p class="lead">Metode Pembayaran</p>
              <img src="<?php echo base_url()?>assets/front-end/images/bca.jpg" alt="BCA" height="50px" width="100px"> 
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; background-color: ">
                Nama Bank = BCA <br>
                No Rek = 9388393994 <br>
                Atas Nama = Kerajinan Tangan <br>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p class="lead">&nbsp;</p>
              <img src="<?php echo base_url()?>assets/front-end/images/bni.png" alt="BCA" height="50px" width="100px"> 
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; background-color: ">
                Nama Bank = BNI <br>
                No Rek = 023 827 2088<br>
                Atas Nama = Kerajinan Tangan <br>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p class="lead">&nbsp;</p>
              <img src="<?php echo base_url()?>assets/front-end/images/bri.png" alt="BCA" height="50px" width="100px"> 
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; background-color: ">
                Nama Bank = BRI <br>
                No Rek = 034 101 000 743 303 <br>
                Atas Nama = Kerajinan Tangan <br>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-3">
              <p class="lead">&nbsp;</p>
              <img src="<?php echo base_url()?>assets/front-end/images/mandiri.png" alt="BCA" height="50px" width="100px"> 
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; background-color: ">
                Nama Bank = MANDIRI <br>
                No Rek = 0700 000 899 992 <br>
                Atas Nama = Kerajinan Tangan <br>
              </p>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <!--
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            -->
            </div>
          </div>
        </section>
			<?php
		}
		
		function dtlpms($id){
			
		}
	}
?>