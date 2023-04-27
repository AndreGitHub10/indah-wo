
  <div class="container main-container headerOffset">
    <div class="row">
      <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
          <li>
            <a href="<?php echo base_url()?>">Home
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('pesan/daftar')?>">Pesan 
            </a>
          </li>
          <li class="active">
            Lihat Pesan 
            
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
        <h1 class="section-title-inner">
          <span>
            <i class="fa fa-envelope"></i> Pesan
          </span>
        </h1>
      </div>
      
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="panel-group" id="accordionNo">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseCategory" class="collapseWill active ">
                  <span class="pull-left"> 
                    <i class="fa fa-arrow-right">
                    </i>
                  </span> Balas Pesan
                </a>
              </h4>
            </div>
            <div id="collapseCategory" class="panel-collapse collapse in">
              <div class="panel-body">
                <form role="form" class="regForm" action="<?php echo base_url('pesan/balas')?>" method="POST">
              <div class="form-group">
                <label>Tanggal Pesan
                </label>
                <input type="text" class="form-control" required  name="tgl_balasan" value="<?php echo date('Y-m-d H:i:s')?>" readonly="">
                <input type="hidden" class="form-control" required  name="id_user" value="<?php echo $this->session->userdata(aoc_enc("UserID"));?>" readonly="">
                <input type="hidden" class="form-control" required  name="id_pesan" value="<?php echo $idpsn ;?>" readonly="">
                <input type="hidden" class="form-control" required  name="level" value="<?php echo $this->session->userdata(aoc_enc("Level")) ;?>" readonly="">
              </div>
              <div class="form-group">
                <label>Pesan Balasan
                </label>
                <textarea class="form-control" name="pesan"></textarea>  
              </div>
              <button type="submit" class="btn   btn-primary">
                <i class="fa fa-envelope">
                </i> Balas Pesan
              </button>
            </form>
              </div>
            </div>
          </div>
          
          </div>
      </div>
      
      <div class="col-lg-9 col-md-9 col-sm-12">
				<?php $psn=$this->M_data->data("tbl_pesan",array("id_pesan"=>$idpsn))->row();echo "<b>".$psn->judul."</b><br>".$psn->pesan?><hr>
        <?php
					if ($this->session->userdata(aoc_enc("Level"))=='1'){
						$this->M_proses->ubah("tbl_balasan",array("status"=>'0'),array("id_pesan"=>$idpsn,"status"=>'2'));
					}else{$this->M_proses->ubah("tbl_balasan",array("status"=>'0'),array("id_pesan"=>$idpsn,"status"=>'1'));}
          
					foreach ($this->M_data->data("tbl_balasan",array("id_pesan"=>$idpsn),null,null,"id_pesan","asc")->result() as $r){
            $id_pesan   = $r->id_pesan; 
            $tampil     = $r->tampil;

                    if ($tampil=='wo'){
											$idwo = $this->M_data->data("tbl_pesan",array("id_pesan"=>$id_pesan))->row()->id_wo;
                      $nama  = $this->M_data->data("tbl_wo",array("id_wo"=>$idwo))->row()->nama_wo;
                    } else {
                      $idpel = $this->M_data->data("tbl_pesan",array("id_pesan"=>$id_pesan))->row()->id_user;
                      $nama  = $this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$idpel))->row()->nama_pelanggan;
                    }
              ?>
        <div class="row userInfo">
          <?php
            if ($tampil=='pelanggan'){
          ?>
          <div class="col-xs-12 col-sm-12">
            <div class="w100 clearfix">
              <ul class="orderStep orderStepLook2">
                <li class="active">
                  <a href="#">
                    <i class="fa fa-user"> <span><b><?php echo $nama?></b></span></i> <br>
                    <span><?php echo $r->tgl_balasan?>
                    </span> <br>
                    <span><?php echo $r->pesan?>
                    </span>
                  </a>
                </li> 
                
              </ul>
            </div>
          </div>
          <?php
            } else {
          ?>
          <div class="col-xs-12 col-sm-12">
            <div class="w100 clearfix">
              <ul class="orderStep orderStepLook2 pull-right">
                <li class="active">
                  <a href="#">
                    <i class="fa fa-user"> <span><b><?php echo $nama?></b></span></i> <br>
                    <span><?php echo $r->tgl_balasan?>
                    </span> <br>
                    <span><?php echo $r->pesan?>
                    </span>
                  </a>
                </li> 
                
              </ul>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
        <?php } ?>

      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div style="clear:both">
    </div>
  </div>
  <div class="gap">
  </div>
  