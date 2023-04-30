
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
                                    $nama_pel = $this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$idpel))->row()->nama_pelanggan;

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
																<?php if ($r->bukti_transaksi!='' && $r->bukti_dp!=''){?>
                                                                    <button type="button" class="btn btn-success" onclick="bukti('<?php echo base_url("foto/bukti/".$r->bukti_dp)?>','<?php echo base_url("foto/bukti/".$r->bukti_transaksi)?>','<?php echo $r->bank_dp ?>','<?php echo $r->bank ?>','<?php echo $r->tgl_dp ?>','<?php echo $r->tgl_pembayaran ?>')"><i class="fa fa-photo"></i> Bukti Transaksi <span class="badge">2</span></button>
                                                                    <?php } else if ($r->bukti_dp!='' && $r->bukti_transaksi=='') {?>
                                                                        <button type="button" class="btn btn-warning" onclick="bukti('<?php echo base_url("foto/bukti/".$r->bukti_dp)?>',null,'<?php echo $r->bank_dp ?>',null,'<?php echo $r->tgl_dp ?>')"><i class="fa fa-eye"></i> Bukti Transaksi <span class="badge">1</span></button>
																<?php } if ($r->bukti_dp==null) {?>
                                <button type="button" class="btn btn-default" onclick="konfirm('<?php echo $r->id_transaksi?>')"><i class="fa fa-credit-card"></i> Konfirmasi &#40;DP&#41;</button>
                                <?php } if ($status=='Lunas'){?>
                                <a href="<?php echo base_url("pemesanan/cetak/".$r->id_transaksi)?>" target="blank">
                                <button type="button" class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
                                </a>
                                <button type="button" class="btn btn-success" onclick="ulasan('<?php echo $r->id_transaksi?>','<?php echo $nama_pel ?>','<?php echo $r->ulasan ?>','<?php echo $r->rating ?>')"><i class="fa fa-paper-plane"></i> Berikan Ulasan</button>
                                <?php } if ($status=='Dp'){?>
                                <button type="button" class="btn btn-default" onclick="pelunasan('<?php echo $r->id_transaksi?>')"><i class="fa fa-clock-o"></i> Konfirmasi &#40;Pelunasan&#41;</button>
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
        <div class="modal fade" id="rateus" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<center><h4 id="judul"></h4></center>
						
					</div>
					<div class="modal-body modal-body-sub_agile" id="ratebody">
                        <div class='alert alert-info'><span><i class='fa fa-info-circle'></i> Ulasan kamu dapat dilihat oleh banyak orang.</span></div>
					<form id='rating-form' method='post' enctype='multipart/form-data' class='form-horizontal'>
                    <div class='form-group'>
                        <label class='col-sm-2 control-label'>Nama</label>
                        <div class='col-sm-8'>
                            <p id='rating-nama-pel' style="font-size:18px;"></p>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='rating' class='col-sm-2 control-label'>Rating</label>
                        <div class="rating col-sm-8" style="font-size:20px;" >
                            <input type="radio" name="rating" id="rating-1" value="1">
                            <label for="rating-1"><i class="fa fa-star"></i></label>
                            <input type="radio" name="rating" id="rating-2" value="2">
                            <label for="rating-2"><i class="fa fa-star"></i></label>
                            <input type="radio" name="rating" id="rating-3" value="3">
                            <label for="rating-3"><i class="fa fa-star"></i></label>
                            <input type="radio" name="rating" id="rating-4" value="4">
                            <label for="rating-4"><i class="fa fa-star"></i></label>
                            <input type="radio" name="rating" id="rating-5" value="5">
                            <label for="rating-5"><i class="fa fa-star"></i></label>
                            <span><span id='nilai-rating'>0</span>/5</span>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='rating' class='col-sm-2 control-label'>Ulasan</label>
                        <div class='col-sm-8'>
                            <textarea type='text' name='ulasan' id='ulasan' class='form-control' placeholder='Masukkan ulasan' required rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type='submit' class='btn btn-success'><i class="fa fa-paper-plane"></i> Kirim Ulasan</button></form>
                        </div>
                    </div>
					</div>
					<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button></div>
				</div>
			</div>
		</div>
	<script>
        $(document).ready(function() {
        // Add or remove a class based on user's rating selection
            $('input[name="rating"]').change(function() {
                var rating = $(this).val();
                $('.rating label').removeClass('checked');
                $('.rating label:lt(' + rating + ')').addClass('checked');
                $('#nilai-rating').text(rating);
            });
        });
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
		
		function bukti(gmb,gmb2F,ref,ref2F,tgl,tgl2F){
			var gmb2=null;
			var ref2=null;
			var tgl2=null;
			var refs1="";
			var refs2="";
			if(gmb2F!=null){
				gmb2="<div class='panel panel-success'><div class='panel-heading'><span class='panel-title'>Gambar</span></div><div class='panel-body'><center><img src='"+gmb2F+"' height='450px'></center></div></div>";
			} else {
				gmb2="<div class='panel panel-danger' style='margin-top:20px;'><div class='panel-heading'><span class='panel-title'>Keterangan</span></div><div class='panel-body'><span>Bukti transfer belum diunggah</span></div></div>";
			}
			if(ref2F!=null){
				ref2="<div class='panel-heading'><span class='panel-title'>Keterangan : </span></div><div class='panel-body'><span>"+ref2F+"</span></div>";
				tgl2="<div class='panel-heading'><span class='panel-title'>Tanggal : </span></div><div class='panel-body'><span>"+tgl2F+"</span></div>";
				refs2="<div class='row' style='margin-top:20px;'><div class='col-md-6'><div class='panel panel-success'>"+ref2+"</div></div><div class='col-md-6'><div class='panel panel-success'>"+tgl2+"</div></div></div>"
			}else{
				refs2="";
			}
			ref="<div class='panel-heading'><span class='panel-title'>Keterangan : </span></div><div class='panel-body'><span>"+ref+"</span></div>";
			tgl="<div class='panel-heading'><span class='panel-title'>Tanggal : </span></div><div class='panel-body'><span>"+tgl+"</span></div>";
			refs1="<div class='row' style='margin-top:20px;'><div class='col-md-6'><div class='panel panel-success'>"+ref+"</div></div><div class='col-md-6'><div class='panel panel-success'>"+tgl+"</div></div></div>"
			
			$("#fbody").html("<div style='min-height:400px;'><ul class='nav nav-tabs' style='background-color:white;font-weight:900;'><li class='active' ><a href='#dp' data-toggle='tab'>Bukti DP</a></li><li><a href='#lunas' data-toggle='tab'>Bukti Lunas</a></li></ul><div class='tab-content' ><div class='tab-pane active' id='dp'>"+refs1+"<div class='panel panel-success'><div class='panel-heading'><span class='panel-title'>Gambar</span></div><div class='panel-body'><center><img src='"+gmb+"' height='450px'></center></div></div></div><div class='tab-pane' id='lunas'>"+refs2+gmb2+"</div></div>");
			// $("#refs").html(ref);
			
			$("#mBantu").modal("show");
		}
		
		function konfirm(id){
			$("#fbody").html("<form action='<?php echo base_url()?>pemesanan/up_bukti_dp/"+id+"' method='post' enctype='multipart/form-data'>"+
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

        function ulasan(id,nama,ulasan,rating){
            const form = document.getElementById('rating-form');
            const text = document.getElementById('ulasan');
            const radio = document.getElementsByName('rating');
            form.setAttribute('action','<?php echo base_url()?>pemesanan/rate/'+id);
            if(ulasan!='' && rating!=''){
                text.value = ulasan;
                console.log(rating)
                radio[rating-1].checked = true;
                $('.rating label').removeClass('checked');
                $('.rating label:lt(' + rating + ')').addClass('checked');
                $('#nilai-rating').text(rating);
            }
            $("#rating-nama-pel").text(nama);
			$("#judul").html("Berikan Penilaian");
			$("#rateus").modal("show");
        }
	</script>