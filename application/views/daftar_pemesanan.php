
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb"> 
                    </ol>
                </div>
            </div>
            
            <div class="row confirm">
                <div class="col-md-12">
                    <h2 class="text-center">DAFTAR PEMESANAN PAKET <i class="fa fa-gift"></i></h2>
                    <div class="box-body table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pernikahan</th>
                            <th>Nama Pelanggan</th>
                            <th>Wedding Organizer</th>
                            <th>No Transaksi</th>
                            <th>Tgl Transaksi</th>
                            <th>Total Harga</th>
                            <th>Tujuan Pengiriman</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Uang masuk</th>
                            <th>Sisa Pembayaran</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no  = 1;
                            foreach($dtpms as $r){  
															if (strtotime($r->tgl_pernikahan)>=time()){
                                    $idtrans = $r->id_transaksi;
																		$idpel = $this->M_data->data("tbl_keranjang",array("id_transaksi"=>$idtrans))->row()->id_pelanggan;
																		
																		$id_prov    = $r->id_prov;
                                    $id_kabkot  = $r->id_kabkot;
                                    $id_kec     = $r->id_kec;

                                    $nama_prov  = $this->M_data->data("tbl_prov",array("id_prov"=>$id_prov))->row()->nama_prov;

																		$dtkk=$this->M_data->data("tbl_kabkot",array("id_kabkot"=>$id_kabkot))->row();
                                    $nama_kabkot  = $dtkk->nama_kabkot;
                                    

                                    $nama_kec  = $this->M_data->data("tbl_kec",array("id_kec"=>$id_kec))->row()->nama_kec;  

                                    $total_transaksi = $r->total_transaksi;

                                    $totalnya = $total_transaksi;
                                    $jumlah_dp = $r->jumlah_dp;
                                    $sisa_pembayaran = $r->sisa_pembayaran;  

                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $r->tgl_pernikahan?></td>
                            <td><?php echo $this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$idpel))->row()->nama_pelanggan;?></td>
                            <td><?php echo $this->M_data->data("tbl_wo",array("id_wo"=>$r->id_wo))->row()->nama_wo;?></td>
                            <td><?php echo $idtrans?></td>
                            <td><?php echo $r->tgl_transaksi?></td>
                            <td><?php echo "Rp ".number_format($totalnya,0,",",".");?></td>
                            <td><?php echo $nama_prov." - ".$nama_kabkot." - ".$nama_kec;?></td>
                            <td><?php echo $r->catatan?></td>
                            <td><?php echo $status = $r->status;?></td>
                            <td><?php echo "Rp ".number_format($jumlah_dp,0,",",".");?></td>
                            <td><?php echo "Rp ".number_format($sisa_pembayaran,0,",",".");?></td>
                            <td>
                                <a href="<?php echo base_url("pemesanan/detail/".$r->id_transaksi)?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Detail</button>
                                </a>

                                <button type="button" class="btn btn-warning" onclick="invoi('<?php echo $r->id_transaksi?>')"><i class="fa fa-eye"></i> Lihat Invoice</button>
																<?php if ($r->bukti_transaksi!=''){?>
                                <button type="button" class="btn btn-success" onclick="bukti('<?php echo base_url("foto/bukti/".$r->bukti_transaksi)?>','<?php echo $r->bank.' ('.$r->tgl_pembayaran.')'?>')"><i class="fa fa-check"></i> Bukti Transaksi</button>
																<?php }else{?>
                                <button type="button" class="btn btn-default" onclick="konfirm('<?php echo $r->id_transaksi?>')"><i class="fa fa-clock-o"></i> Konfirmasi</button>
                                <?php } if ($status=='Lunas'){?>
                                <a href="<?php echo base_url("pemesanan/cetak/".$r->id_transaksi)?>" target="blank">
                                <button type="button" class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
                                <?php } if ($status=='Dp'){?>
                                <button type="button" class="btn btn-default" onclick="pelunasan('<?php echo $r->id_transaksi?>')"><i class="fa fa-clock-o"></i> Konfirmasi Pelunasan</button>
                                <a href="<?php echo base_url("pemesanan/cetak/".$r->id_transaksi)?>" target="blank">
                                <button type="button" class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
                            </a>
                                <?php }?>
                            </td>
                        </tr>                                    
												<?php }}?>       
                    </tbody>
                    
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
		<div class="modal fade" id="mBantu" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<center><h4 id="refbukti"></h4></center>
						
					</div>
					<div class="modal-body modal-body-sub_agile" id="fbody">
					
					</div>
					<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button></div>
				</div>
			</div>
		</div>
	<script>
		function GetxhrObject(){
			var xhr=null;
			try {xhr=new XMLHttpRequest();}
			catch (e){
				try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
				catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
			}
			return xhr;
		};
		
		function invoi(id){
			var xhr		 = GetxhrObject();
			if (xhr) {
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						$("#fbody").html(xhr.responseText);
						$("#mBantu").modal("show");
					}
				}
				xhr.open("POST","<?php echo base_url().'mbantu/invoice'?>/"+id);
				xhr.send();
			}
		}
		
		function bukti(gmb,ref){
			$("#fbody").html("<center><img src='"+gmb+"' height='450px'></center>");
			$("#refbukti").html(ref);
			$("#mBantu").modal("show");
		}
		
		function konfirm(id){
			$("#fbody").html("<form action='<?php echo base_url()?>pemesanan/up_bukti/"+id+"' method='post' enctype='multipart/form-data'>"+
			"<input type='file' class='form-control' name='bukti' accept='image/*' required><br>"+
            "<input type='text' name='bank' class='form-control' placeholder='Keterangan' required><br>"+
			"<button type='submit' class='btn btn-success'>Upload Bukti</button></form>");
			$("#refbukti").html("Upload Bukti Pembayaran");
			$("#mBantu").modal("show");
		}

        function pelunasan(id){
			$("#fbody").html("<form action='<?php echo base_url()?>pemesanan/up_bukti/"+id+"' method='post' enctype='multipart/form-data'>"+
			"<input type='file' class='form-control' name='bukti' accept='image/*' required><br>"+
            "<input type='text' name='bank' class='form-control' placeholder='Keterangan' required><br>"+
			"<button type='submit' class='btn btn-success'>Upload Bukti</button></form>");
			$("#refbukti").html("Upload Bukti Pembayaran");
			$("#mBantu").modal("show");
		}
	</script>