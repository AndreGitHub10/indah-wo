<?php 
	if ($cr!=null){$q=$cr;}
	if ($q=='' or empty($q) or $q==null){
		$dwo=$this->M_data->data("tbl_wo",null,4,(($kehal-1)*4))->result();
		$totpk=ceil($this->M_data->data("tbl_wo")->num_rows()/4);
	}else{
		$dwo=$this->M_data->cari("tbl_wo",array("nama_wo"=>$q),'and',4,(($kehal-1)*4))->result();
		$totpk=ceil($this->M_data->cari("tbl_wo",array("nama_wo"=>$q),'and')->num_rows()/4);
	}
?>
  
<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">

		    <h3 class="wthree_text_info">Daftar <span>Wedding Organizer</span></h3>		
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>WEDDING</li> 
						</ul>
					<div class="resp-tabs-container">
					<!-- WEDDING  -->
						<div class="tab1">
							<?php foreach ($dwo as $r){?>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo base_url("foto/wo/".$r->foto)?>" alt="" class="pro-image-front" style="width: 100%;height: 200px">
										<img src="<?php echo base_url("foto/wo/".$r->foto)?>" alt="" class="pro-image-back">
											 
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product " style="height: 200px">
										<h4 style="height: 30px"><a href="#"><?php echo $r->nama_wo;?></a></h4>
										<div class="info-product-price">
											<span class="item_price" style="font-size: 13px">  
												<?php 
									 	$deskripsi_wo = strip_tags($r->deskripsi_wo);
									 	echo substr($deskripsi_wo,0,60);
									 ?>
									 <a href="<?php echo base_url("paket/index/all/".$r->id_wo);?>"> <span style='color:orange'>[Read More...]</span> <br><br></span></a>

											<span class="item_price"></span>
											  
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form action="#" method="post">
																<fieldset> 
							 
                            <a href="<?php echo base_url("paket/index/all/".$r->id_wo)?>">
                            <input type="button" name="button" value="LIHAT WO" class="button" style="color: white;background-color: black;font-weight: bold;" />
                            </a>
                             		</fieldset>
															</form>
														</div>
									</div>
								</div>
							</div>
							<?php }?>
							<!-- begin:pagination -->
							<div class="row">
								<div class="col-md-12">	<hr>
									<div class="btn-group">
	        <button class="btn btn-default" onclick="kehal('1')" type="button"><<</button>
					<?php
	          //Disini Proses Pagingnya...
	          $i=-1;
	          if ($this->uri->segment(4)==null){$hlm=1;}else{$hlm=$this->uri->segment(4);}
	          if ($totpk>2){$n=1; if ($hlm==$totpk){$n=$n-1;$i=-2;}}else{$n=$totpk-2;}
	          for ($i;$i<=$n;$i++){
	            if ($hlm>=2){$hal=$hlm+$i;}else{$hal=$hlm+$i+1;}
	        ?>
	          <button class="btn btn-<?php if ($hal==$hlm){echo "primary active";}else{echo "default";}?>" onclick="kehal('<?php echo $hal?>')" type="button"><?php echo $hal?></button>
	        <?php }?>
					<button class="btn btn-default" onclick="kehal('<?php echo $totpk?>')" type="button">>></button>
	      </div>
								</div>
							</div>
							<!-- end:pagination -->	
							<div class="clearfix"></div>
						</div> 

 
						
						
					</div>
				</div>	
			</div>
		</div>
	<!-- //new_arrivals --> 
	<!-- /we-offer -->

	<!-- //we-offer -->
<script>
	function kehal(a){
	  location.href="<?php echo base_url().'index/index/wo'?>/"+a+"/<?php echo $q?>";
	}
</script>