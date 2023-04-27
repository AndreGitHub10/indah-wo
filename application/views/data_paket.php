
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
                    <h2 class="text-center">DAFTAR PAKET <i class="fa fa-gift"></i></h2>
                    <br>
                    <div class="box-body table-responsive">
                    
                    <table id="example1"  class="table table-bordered table-striped" >
                    <thead>
                            <tr style="background-color: #c4c4ff;color:white"> 
                                <th>No</th> 
                                <th>Nama Paket</th>
                                <th>Kategori</th> 
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Total Harga</th> 
                                <th>Rincian</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($dtwo as $r){?>
                            <tr style="background-color:white"> 
                                <td style="background-color:white"><?php echo $no++.'.'.$r->id_paket;?></td>
                                <td><?php echo $r->nama_paket?></td>
                                <td><?php echo $this->M_data->data("tbl_kategori",array("id_kategori"=>$r->id_kategori))->row()->kategori?></td> 
                                <td><?php echo "Rp ".number_format($r->harga,0,",",".")?></td>
                                <td><?php echo $r->diskon?> %</td>
                                <td><?php echo "Rp ".number_format($r->total_harga,0,",",".")?></td> 
                                <td><?php echo $r->rincian?></td> 
                                
                                <td>
                                    
                                    <a href="<?php echo base_url("foto/data_foto/".$r->id_paket);?>">
                                    <button class="btn btn-xs btn-success" title="edit"><i class="fa fa-picture-o"></i> Foto</button>
                                    </a> 
                                    
                                    <a href="<?php echo base_url("paket/edit/".$r->id_paket);?>">
                                    <button class="btn btn-xs btn-info" title="edit"><i class="fa fa-edit"></i></button>
                                    </a>

                                    <a href="<?php echo base_url("paket/hapus/".$r->id_paket);?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?') ";>
                                    <button class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash-o"></i></button>
                                    </a>
                                </td>
                                
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
                    
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
     