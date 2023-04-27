<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>DATA PEMESANAN</h3></div>
            <div class="row">
 
                <div class="col-lg-12">
                    <div class="form-panel">
                          <form action="" method="POST" class="form-horizontal style-form" enctype="multipart/form-data">   
                              <div class="form-group">
                                  <label class="control-label col-md-2">Dari Tanggal</label>
                                  <div class="col-md-3 col-xs-11">  
                                      <input type="text" value="" id="datetimepicker" class="form-control ambltgl" name="dari_tanggal"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-2">Sampai Tanggal</label>
                                  <div class="col-md-3 col-xs-11">  
                                      <input type="text" value="" id="datetimepicker2" class="form-control ambltgl" name="sampai_tanggal"/>
                                  </div>
                              </div> 
                              <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-primary" type="button" onclick="cari_trans()"><i class="fa fa-search"></i> Cari</button>
                                      
                                      <button class="btn btn-success" type="button" onclick="cetak_trans()"><i class="fa fa-print"></i> Cetak</button>
                                  </div>
                              </div> 
                          </form>
                          <div id="dftrans"></div>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->
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
	function cari_trans(){
		var tgl1=$("#datetimepicker").val();
		var tgl2=$("#datetimepicker2").val();
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('form_bantu/daftar_trans')?>/"+tgl1+"/"+tgl2
		})
		.done(function( msg ) {
			if (msg!=""){
				$("#dftrans").html(msg);
				//$("#mBantu").modal("show");
			}else{$.notify({title:"<b>Gagal Memuat Form.!!</b>",message:"<br>Mohon ulangi beberapa saat lagi.!!"},{type:"warning",timer: 4000,placement: {from: "top",	align: "right"}})}
		});
	}
	
	function cetak_trans(){
		var tgl1=$("#datetimepicker").val();
		var tgl2=$("#datetimepicker2").val();
		
		location.href="<?php echo base_url('admin/cetak/pms')?>/"+tgl1+"/"+tgl2
	}
	
	
</script>