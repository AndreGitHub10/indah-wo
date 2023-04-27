<?php 
	if ($this->session->userdata(aoc_enc("Level"))=='1'){
		$dtuser=$this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$this->session->userdata(aoc_enc("UserID"))))->row();
	}else{
		$dtuser=$this->M_data->data("tbl_wo",array("id_wo"=>$this->session->userdata(aoc_enc("UserID"))))->row();
	}
?>

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
                    <form class="form-horizontal" method="post" action="page/produk/edit.php" name="form1" enctype="multipart/form-data">
                    
                        <h3 class="text-center">PROFIL</h3>
                        <hr>

                        <?php
                            if ($this->session->userdata(aoc_enc("Level"))=='1'){
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Nama</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->nama_pelanggan?> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Alamat</label>
                            <div class="col-sm-6">
                             <?php echo $dtuser->alamat?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">No Telpon</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->no_telp?> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Email</label>
                            <div class="col-sm-6">
                              <?php echo $dtuser->email?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Foto</label>
                            <div class="col-sm-6">
                              <img src="<?php echo base_url("foto/pelanggan/".$dtuser->foto)?>" width="250px" height="300px" alt="no image"> 
                            </div>
                        </div> 
                        <?php
                          } else {
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Nama Pemilik</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->nama_pemilik?> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Nama wo</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->nama_wo?> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Deskripsi wo</label>
                            <div class="col-sm-6">
                             <?php echo $dtuser->deskripsi_wo?>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Telpon wo</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->telp_wo?> 
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Alamat wo</label>
                            <div class="col-sm-6">
                             <?php echo $dtuser->alamat_wo?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">MAP</label>
                            <div class="col-sm-6">
                             <?php echo $dtuser->map?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">No Rekening</label>
                            <div class="col-sm-6">
                               <?php echo $dtuser->rek_wo?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Atas Nama</label>
                            <div class="col-sm-6">
                              <?php echo $dtuser->atas_nama?> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Email</label>
                            <div class="col-sm-6">
                              <?php echo $dtuser->email?> 
                            </div>
                        </div> 
                         <div class="form-group">
                            <label class="col-sm-3" style="text-align: right">Foto</label>
                            <div class="col-sm-6">
                              <img src="<?php echo base_url("foto/wo/".$dtuser->foto)?>" width="250px" height="300px"> 
                            </div>
                        </div> 
                        <?php
                          }
                        ?>




                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                              <?php
                                if ($this->session->userdata(aoc_enc("Level"))=='1'){
                              ?>
                              <a href="<?php echo base_url('index/ubahprofil/pel/'.$this->session->userdata(aoc_enc("UserID")))?>">
                              <button type="button" class="btn btn-green">EDIT </button>
                              </a>
                              <?php
                                } else {
                              ?>
                              <a href="<?php echo base_url('index/ubahprofil/wo/'.$this->session->userdata(aoc_enc("UserID")))?>">
                              <button type="button" class="btn btn-green">EDIT </button>
                              </a>
                              <?php
                                }
                              ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>