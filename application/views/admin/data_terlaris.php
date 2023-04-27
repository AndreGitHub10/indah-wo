<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>DATA TERLARIS</h3></div>
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
                                      <button class="btn btn-success" type="button" onclick="cetak_ter()"><i class="fa fa-print"></i> Cetak</button>
                                  </div>
                              </div> 
                          </form>
                          <div id="dftrans"></div>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->
</div>
<script>
	function cetak_ter(){
		var tgl1=$("#datetimepicker").val();
		var tgl2=$("#datetimepicker2").val();
		
		location.href="<?php echo base_url('admin/cetak/trl')?>/"+tgl1+"/"+tgl2
	}
</script>