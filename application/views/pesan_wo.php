<?php if ($this->session->userdata(aoc_enc("Level"))=='1'){?>
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
          <h2> 
            Pilih WO yang akan dikirimkan pesan
          </h2>
        </div>    
       <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>No</th>
                      <th>Nama WO</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($dftwo as $r){?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $r->nama_wo;?></td>
                      <td><?php echo $r->telp_wo;?></td>
                      <td><?php echo $r->alamat_wo;?></td>
                      <td>

                      <button type="button" class="btn btn-primary" onclick="pesan('<?php echo $r->id_wo;?>','<?php echo $r->nama_wo;?>')">
                        <i class="fa fa-envelope"></i> Kirim Pesan 
                      </button>


                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                  
                </table>   
        
      </div>
      
    </div>
    <div style="clear:both">
    </div>
  </div>
  <div class="modal fade" id="mPesan" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4>Kirim Pesan Kepada <span id="nmwo"></span></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body modal-body-sub_agile">
						<form role="form" class="regForm" action="" id="frmPesan" method="POST">
              <div class="form-group">
                <label>Tanggal Pesan</label>
                <input type="text" class="form-control" required  name="tgl_pesan" value="<?php echo date('Y-m-d H:i:s')?>" readonly="">
              </div>
              <div class="form-group">
                <label>Judul Pesan</label>
                <input type="text" class="form-control" required  name="judul" value="">
              </div>
              <div class="form-group">
                <label>Isi Pesan</label>
                <textarea class="form-control" name="pesan"></textarea>  
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-envelope"></i> Kirim 
              </button>
            </form>
					</div>
				</div>
			</div>
		</div>
<script>
	function pesan(a,b){
		$("#nmwo").text(b);
		$("#frmPesan").attr("action","<?php echo base_url()?>pesan/kirim/"+a);
		$("#mPesan").modal("show");
	}
</script>
<?php }?>