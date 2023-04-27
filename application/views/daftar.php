<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><span>Daftar Sebagai</span> <?php if ($q=='wo'){echo "WO";}else{echo "Pelanggan";}?></h3>
			<!--/w3_short-->
				 
	   <!--//w3_short-->
	</div>
</div>
 

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits" >
	<div class="container"> 
	      
		         <div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Form Pendaftaran</li> 
						</ul>
					<div class="resp-tabs-container"> 
						<div class="tab2">
 
							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids"> 
									 <div class="add-review"> 
									 <?php if ($q=='wo'){?>
										<form action="<?php echo base_url("index/pros_daftar/wo")?>" method="POST" class="form-horizontal style-form" enctype="multipart/form-data"> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Nama Pemilik</label>
			                                  <div class="col-md-10">  
			                                      <input type="text" value="" name="nama_pemilik" class="form-control" required="">
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Nama WO</label>
			                                  <div class="col-md-10">  
			                                      <input type="text" value="" name="nama_wo" class="form-control" required=""/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Deskripsi WO</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <textarea  name="deskripsi_wo" class="form-control" required=""></textarea>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Telp WO</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <input type="number" value="" name="telp_wo" class="form-control" required=""/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Alamat WO</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <textarea type="text" value="" name="alamat_wo" class="form-control" required=""></textarea>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Rekening WO</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <textarea type="text" value="" name="rek_wo" class="form-control" required=""></textarea>
			                                  </div>
			                              </div>
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Atas Nama</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <textarea type="text" value="" name="atas_nama" class="form-control" required=""></textarea>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Email</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <input type="text" value="" id="email" name="email" class="form-control" onchange="cek_mail(this)" required=""/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Password</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <input type="password" value="" id="password1" name="password1" class="form-control" required="">
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Konfirmasi Password</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <input type="password" value="" id="password2" name="password2" class="form-control" onchange="cek_pass(this)" required="">
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Foto WO</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                      <input type="file" value="" name="foto" class="form-control"/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-2">Map</label>
			                                  <div class="col-md-8 col-xs-11">  
			                                       <textarea type="text" value="" name="map" class="form-control"></textarea>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <div class="col-lg-offset-2 col-lg-10">
			                                      <button class="btn btn-success" type="submit">Daftar</button>
			                                      <button class="btn btn-primary" type="reset">Bersih</button>
			                                  </div>
			                              </div> 
				                        </form>
									 <?php }else{?>
											<form action="<?php echo base_url("index/pros_daftar/pel")?>" method="POST" class="form-horizontal style-form" enctype="multipart/form-data"> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Nama Pelanggan</label>
			                                  <div class="col-md-9">  
			                                      <input type="text" value="" name="nama_pelanggan" class="form-control" required="">
			                                  </div>
			                              </div>   
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Nomor Telp </label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <input type="number" value="" name="no_telp" class="form-control" required=""/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Alamat </label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <textarea type="text" value="" name="alamat" class="form-control" required=""></textarea>
			                                  </div>
			                              </div> 
			                              
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Email</label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <input type="text" value="" id="email" name="email" class="form-control" onchange="cek_mail(this)" required=""/>
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Password</label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <input type="password" value="" id="password1" name="password1" class="form-control" required="">
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Konfirmasi Password</label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <input type="password" value="" id="password2" name="password2" class="form-control" onchange="cek_pass(this)" required="">
			                                  </div>
			                              </div> 
			                              <div class="form-group">
			                                  <label class="control-label col-md-3">Foto </label>
			                                  <div class="col-md-9 col-xs-11">  
			                                      <input type="file" value="" name="foto" class="form-control"/>
			                                  </div>
			                              </div>  
			                              <div class="form-group">
			                                  <div class="col-lg-offset-3 col-lg-9">
			                                      <button class="btn btn-success" type="submit">Daftar</button>
			                                      <button class="btn btn-primary" type="reset">Bersih</button>
			                                  </div>
			                              </div> 
				                        </form>
									 <?php }?>
									</div>
								 </div>
								 
							 </div> 

						 </div>
					</div>
				</div>	
			</div>
	        </div>
 </div>
 <script>
 function GetxhrObject(){
		var xhr=null;
		try {xhr=new XMLHttpRequest();}
		catch (e){
			try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
			catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
		}
		return xhr;
	}
	
	function cek_mail(n){
		var xhr = GetxhrObject();
		if (xhr) {
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (xhr.responseText>0){
						alert('Email Sudah dipakai.!!');
						$("#email").val("");
						$("#email").focus();
					}
				}
				if (xhr.status==500 || xhr.status==401 || xhr.status==403 || xhr.status==400){
					alert('Tidak terhubung ke server.!!');
				}
			}
			xhr.open("POST","<?php echo base_url().'index/cek_mail/'?>"+n.value.replace("@","%10"));
			xhr.send();
		}
	}
	
	function cek_pass(n){
		if (n.value!=$("#password1").val()){n.value='';alert("Password tidak sama.!!");}
	}
 </script>