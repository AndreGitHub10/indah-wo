 
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
                    <h2 class="text-center">KERANJANG PEMESANAN <i class="fa fa-shopping-cart"></i></h2> 
                    <form class="form-horizontal" method="post" action="<?php echo base_url('keranjang/checkout')?>" name="form1" enctype="multipart/form-data">
				    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama paket</th>
                            <th width="15%">Kategori paket</th>
                            <th width="10%">Harga</th> 
                            <th width="20%">Jumlah Harga</th>
                            <th width="20%">Catatan</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;$total=0; foreach ($this->M_data->data("tbl_keranjang",array("id_pelanggan"=>$this->session->userdata(aoc_enc("UserID")),"status"=>'1'))->result() as $r){$pkt=$this->M_data->data("tbl_paket",array("id_paket"=>$r->id_paket))->row();?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $pkt->nama_paket?></td>
                            <td><?php echo $this->M_data->data("tbl_kategori",array("id_kategori"=>$pkt->id_kategori))->row()->kategori?></td>
                            <td><?php echo "Rp ".number_format($pkt->total_harga,0,",",".")?></td> 
                            <td>
                                <?php
                                     echo "Rp ".number_format($r->jumlah_harga,0,",",".");

                                    $diskon         = $pkt->diskon;
                                    $jumlah_harga   = $r->jumlah_harga;
                                    if ($no>10){
                                        $total          = $total + $r->jumlah_harga;
                                    } else {
                                        $total          = $total + ($r->jumlah_harga - ($jumlah_harga * ($diskon / 100)));
                                    } 
                                    $status         = $r->status;
                                    $id_transaksi   = $r->id_transaksi;
                                    
                                ?>
                                    
                                </td>
                            <td><?php echo $r->catatan?></td>
                            <td>
                                <a href="<?php echo base_url("keranjang/hapus/".$r->id_keranjang)?>" onclick="return confirm('Apakah anda yakin ingin menghapus paket?')">
                                <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                </a>
                            </td>
                        </tr>                                    
                        <?php
                            }
                        ?>       
                    </tbody>
										<?php if ($no>1){?>
                    <tfoot>
                        <tr> 
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><b>TANGGAL PELAKSANAAN</b></th>
                            <th>
                                <input type="text" value="" id="datetimepicker" class="form-control" name="tgl_transaksi"/>
                                

                            </th> 

                            <th></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><b>KECAMATAN</b></th>
                            <th>
                                <input type="hidden" name="propinsi" value="18">
                                <input type="hidden" name="kota" value="1871">
                                <select  class="form-control" name="kec" required="">
                                <option value="">--Pilih Kecamatan--</option>
                                <?php
                                //mengambil nama-nama propinsi yang ada di database
                                $kota = $this->M_data->data("tbl_kec",array("id_kabkot"=>'1871'))->result();
                                foreach($kota as $r){
                                echo "<option value='$r->id_kec]'>$r->nama_kec</option>";
                                }
                                ?>
                                </select>
                            </th>
                            <th></th> 
                        </tr> 
                        
                        <tr> 
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><b>RINCIAN ALAMAT</b></th>
                            <th> 
                               <textarea class="form-control" name="catatan" placeholder="Rincian Alamat" style="background-color:white"></textarea> 

                               <input type="hidden" name="jumlah" value="<?php echo $id_transaksi;?>">

                               <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi;?>">
                               
                               <input type="hidden" name="total_transaksi" value="<?php echo $total;?>">

                            </th> 

                            <th></th>
                        </tr>
                        
                        <tr> 
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>TOTAL HARGA <br>
                                <b style="color:red"></b></th>
                            <th><?php echo "Rp ".number_format($total,0,",",".");?></th>
                            <th>
                                <?php
                                    if (!$this->session->has_userdata(aoc_enc('UserID'))){
                                ?>
                                <a href="index.php?mod=page/konsumen&pg=daftar_konsumen" onclick="return confirm('Untuk checkout silahkan daftar terlebih dahulu');">
                                <button type="button" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</button> 
                                </a>
                                <?php
                                    } else {
                                ?>
                                <?php 
                                    if ($status==1){
                                ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</button>
                                <?php
                                    }
                                }
                                ?>
                            </th>
                            <th></th>
                        </tr>
                        
                    </tfoot>
										<?php }?>
                </table>
                </form> 
				</div>
			</div>
		</div>
	</div>
	