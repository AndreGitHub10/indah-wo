    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb"> 
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                      <li class="active"> 
                        <a href="<?php echo base_url('pemesanan')?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button>
                        </a>
                      </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">PEMESANAN PAKET  <i class="fa fa-shopping-cart"></i></h2>
                    <div class="box-body table-responsive">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('pemesanan/checkout/'.$q)?>" name="form1" enctype="multipart/form-data">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
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
                    <tfoot>
                        
                        
                        <tr>  
                            <th></th>
                            <th></th>
                            
                            
                            <th colspan="2"><b>TOTAL </b></th> 
                            <th><?php echo "Rp ".number_format($total,0,",",".");?></th> 
                            <th></th> 
                            <th>
                                <?php 
                                    if ($status==1){
                                ?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</button>
                                <?php
                                    }
                                ?>
                            </th> 
                        </tr>
                        
                    </tfoot>
                </table>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    