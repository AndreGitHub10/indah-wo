<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>DETAIL PEMESANAN</h3></div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">PEMESANAN PAKET  <i class="fa fa-shopping-cart"></i></h2>
                    <div class="box-body table-responsive">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('pemesanan/checkout/')?>" name="form1" enctype="multipart/form-data">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead style="background-color:white;">
                        <tr>
                            <th>No</th>
                            <th>Nama paket</th>
                            <th>Kategori paket</th> 
                            <th>Harga</th> 
                            <th>Jumlah Harga</th> 
                            <th>Foto</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no  = 1; $total=0;
                          foreach($dtlpms as $r){  
                            $idpkt = $r->id_paket;
                            $foto = $this->M_data->data("tbl_foto",array("id_paket"=>$idpkt))->row()->foto;         
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $r->nama_paket?></td>
                            <td><?php echo $r->kategori?></td> 
                            <td><?php echo "Rp ".number_format($r->total_harga,0,",",".")?></td> 
                            <td>
                                <?php
                                     echo "Rp ".number_format($r->jumlah_harga,0,",",".");
                                    $total          = $total + $r->jumlah_harga; 
                                    $status         = $r->status;
                                    $id_transaksi   = $r->id_transaksi;
                                ?>
                                    
                            </td> 
                            <td>
                                <a href="<?php echo base_url("foto/paket/".$foto)?>" target="_blank">
                                <img src="<?php echo base_url("foto/paket/".$foto)?>" height="100px" height="80px">
                            </td>
                            <td><?php echo $r->catatan?></td> 
                        </tr>                                    
                        <?php }?>       
                    </tbody>
                    <tfoot style="background-color:white;">
                        
                        
                        <tr>  
                            <th></th>
                            <th></th>
                            
                            
                            <th colspan="2"><b>TOTAL </b></th> 
                            <th><?php echo "Rp ".number_format($total,0,",",".");?></th> 
                            <th></th> 
                            <th>
                            </th> 
                        </tr>
                        
                    </tfoot>
                </table>
                </form>
                </div>
                </div>
            </div>
</div>