
  <div class="container main-container headerOffset">
    <div class="row">
      <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
          <li>
            <a href="<?php echo base_url()?>">Home
            </a>
          </li>
          <li>
            <a href="#">Pesan 
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="w100 clearfix category-top">
          <h1> 
            Daftar Pesan
          </h1>
        </div>    
       <div class="box-body table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>No</th> 
                      <th>Nama</th> 
                      <th>Tanggal Pesan</th>
                      <th>Judul Pesan</th>
                      <th>Isi Pesan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
										if ($this->session->userdata(aoc_enc("Level"))=='1'){
											$dftpesan=$this->M_data->data("tbl_pesan",array("id_user"=>$iduser))->result();
										}else{$dftpesan=$this->M_data->data("tbl_pesan",array("id_wo"=>$iduser))->result();}
                    $no  = 1;
                    foreach($dftpesan as $r){
                    ?>
                    <tr>
                      <td><?php echo $no++;?></td> 
                      <td><?php echo $this->M_data->data("tbl_wo",array("id_wo"=>$r->id_wo))->row()->nama_wo.$this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$r->id_user))->row()->nama_pelanggan;?></td> 
                      <td><?php echo $r->tgl_pesan;?></td>
                      <td><?php echo $r->judul;?></td>
                      <td><?php echo $r->pesan;?></td>
                      <td>

                      <?php 
                        if ($this->session->userdata(aoc_enc("Level"))=='1'){
                          $bls=$this->M_data->data("tbl_balasan",array("id_pesan"=>$r->id_pesan,"status"=>'2'))->num_rows();
                        } else {
                          $bls=$this->M_data->data("tbl_balasan",array("id_pesan"=>$r->id_pesan,"status"=>'1'))->num_rows();
                        }
                      ?>
                      <a href="<?php echo base_url("pesan/detail/".$r->id_pesan);?>">
                      <button type="button" class="btn btn-primary">
                        Lihat Balasan &nbsp; <i class="fa fa-mail-forward"></i><small class="badge bg-green"><?php echo $bls?></small>
                      </button>
                      </a>


                      <a href="<?php echo base_url("pesan/hapus/".$r->id_pesan);?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger">
                        Hapus Pesan <i class="fa fa-trash-o"></i>
                      </button>
                      </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  
                </table>   
        </div>
      </div>
      
    </div>
    <div style="clear:both">
    </div>
  </div>
  