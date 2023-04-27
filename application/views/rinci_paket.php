<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Paket <span>Pemesanan </span></h3>
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container"> 
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_foto",array("id_paket"=>$rpaket->id_paket))->row()->foto)?>">
							<div class="thumb-image"> <img src="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_foto",array("id_paket"=>$rpaket->id_paket))->row()->foto)?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<form action="<?php echo base_url('keranjang/simpan')?>" method="post" enctype="multipart/form-data">

					<input type="hidden" class="form-control" name="id_paket" value="<?php echo $rpaket->id_paket?>" required>
						
					<input type="hidden" class="form-control" name="id_user" value="<?php echo $this->session->userdata(aoc_enc('UserID'))?>" required>

					<input type="hidden" class="form-control" name="stok"  value="1" required readonly="">

					<input type="hidden" class="form-control" name="harga"  value="<?php echo $rpaket->total_harga?>" required readonly="">

					<h3 style="color:black"><?php echo $rpaket->nama_paket?></h3>
					<p><span class="item_price"><?php echo "Rp ".number_format($rpaket->total_harga,0," ",".");?></span>
                            <?php
                              if ($rpaket->diskon!=0){
                            ?>
                            <del><?php echo "Rp ".number_format($rpaket->harga,0," ",".");?></del>
                            <?php
                              }
                            ?>  </p>
					 
					<?php
            if ($this->session->has_userdata(aoc_enc('UserID'))){
						if ($this->session->userdata(aoc_enc("Level"))=='1'){
					?>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Catatan:</h5>
							<textarea class="form-control" name="catatan" ></textarea>
						</div>
					</div> 
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"> 
						<input type="submit" name="submit" value="Pesan Sekarang" class="button" style="background-color: black">  							
						</div> 														
					</div> 

					<?php
						}
						} else {
					?>
					<div class="color-quality">
						<div class="color-quality-right">
							<h5 style="color:red">Untuk melakukan pemesanan silahkan daftar terlebih dahulu</h5> 
						</div>
					</div>
					<?php
						}
					?>

					</form>

		<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Deskripsi</li>
							<!--
							<li>Reviews</li>
							<li>Information</li>
						-->
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls"> 
							   <p class="w3ls_para"><?php echo $rpaket->rincian?> </p>
							</div>
						</div>
						<!--//tab_one-->
 

					</div>
				</div>	
			</div>
					
		      </div>
	 			<div class="clearfix"> </div> 

	 		 
		         <div class="w3_agile_latest_arrivals">
			<h3 class="wthree_text_info">paket <span>Lainnya </span></h3>
					  <?php	foreach ($this->M_data->data("tbl_paket",array("id_wo"=>$rpaket->id_wo),4)->result() as $r){?>	
					  <div class="col-md-3 product-men single">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_foto",array("id_paket"=>$r->id_paket))->row()->foto)?>" alt="" class="pro-image-front" style="width: 100%;height: 250px">
										<img src="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_foto",array("id_paket"=>$r->id_paket))->row()->foto)?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo base_url("paket/rinci/".$r->id_paket)?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html"><?php echo $r->nama_paket;?></a></h4>
										<div class="info-product-price"> 
											<span class="item_price"><?php echo "Rp ".number_format($r->harga,0," ",".");?></span> 
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"> 
																<fieldset> 
																	<?php
                                if (!$this->session->has_userdata(aoc_enc('UserID'))){
                            ?> 
                            <a href="#" data-toggle="modal" data-target="#myModal2" onclick="return confirm('Untuk membeli silahkan daftar terlebih dahulu');"> 
                            <input type="button" name="button" value="Add to cart" class="button" />
                            </a>
                            <?php
                                } else {
                            ?> 
                            <a href="<?php echo base_url("paket/rinci/".$r->id_paket)?>">
                            <input type="button" name="button" value="Pesan Paket Sekarang" class="button" style="background-color: black"/>
                            </a> 
                            <?php
                                } 
                            ?>
																</fieldset> 
														</div>
																			
									</div>
								</div>
							</div>
						<?php
							}
						?>
                       
					   
							<div class="clearfix"> </div>
					<!--//slider_owl-->
		         </div>
	        </div>
 </div>
<!--//single_page-->
<!---728x90--->
<!--/grids-->
