<?php 
	if ($cr!=null){$q=$cr;}
	if ($q=='' or empty($q) or $q==null){
		if ($dtwo==null){
			if ($kat=='all'){
				$paket=$this->M_data->data("tbl_paket",null,6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->data("tbl_paket")->num_rows()/6);
			}else{
				$paket=$this->M_data->data("tbl_paket",array("id_kategori"=>$kat),6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->data("tbl_paket",array("id_kategori"=>$kat))->num_rows()/6);
			}
		}else{
			if ($kat=='all'){
				$paket=$this->M_data->data("tbl_paket",array("id_wo"=>$dtwo->id_wo),6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->data("tbl_paket",array("id_wo"=>$dtwo->id_wo))->num_rows()/6);
			}else{
				$paket=$this->M_data->data("tbl_paket",array("id_wo"=>$dtwo->id_wo,"id_kategori"=>$kat),6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->data("tbl_paket",array("id_wo"=>$dtwo->id_wo,"id_kategori"=>$kat))->num_rows()/6);
			}
		}
	}else{
		if ($dtwo==null){
			if ($kat=='all'){
				$paket=$this->M_data->cari("tbl_paket",array("nama_paket"=>$q),'and',6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->cari("tbl_paket",array("nama_paket"=>$q),'and')->num_rows()/6);
			}else{
				$paket=$this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_kategori"=>$kat),'and',6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_kategori"=>$kat),'and')->num_rows()/6);
			}
		}else{
			if ($kat=='all'){
				$paket=$this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_wo"=>$dtwo->id_wo),'and',6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_wo"=>$dtwo->id_wo),'and')->num_rows()/6);
			}else{
				$paket=$this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_wo"=>$dtwo->id_wo,"id_kategori"=>$kat),'and',6,(($kehal-1)*6))->result();
				$totpk=ceil($this->M_data->cari("tbl_paket",array("nama_paket"=>$q,"id_wo"=>$dtwo->id_wo,"id_kategori"=>$kat),'and')->num_rows()/6);
			}
		}
	}
?>
 
 <div class="contact-w3-agile1 map" data-aos="flip-right"><?php if ($dtwo!=null){echo $dtwo->map;}?></div>
 
<div class="banner-bootom-w3-agileits">
    <div class="container">
         <!-- mens -->
        <div class="col-md-4 products-left">
            <div class="filter-price">
                <h3>&nbsp;<span></span></h3>
                    
            </div>
            <div class="filter-price">
                <h3>&nbsp;<span></span></h3>
                    
            </div>
             
            <div class="css-treeview" style="background-color: yellow">
                <h4 style="background-color: black">PROFIL WO</h4>
                <div class="col-md-12 agileits-w3layouts" style="background-color: yellow"> 
									<table class="table" >
                    <thead>
                      <tr>
                        <th>Rincian WO</th> 
                      </tr>
                    </thead>
                    <tbody>
										<tr>
                    <td><code style="font-size: 20px;color: black;background-color: yellow;text-align: center"><?php if ($dtwo!=null){echo $dtwo->nama_wo;}else{echo "Semua WO";}?></code> 
                    </td></tr>
                    <tr>
                    <td><code style="font-size: 20px;color: black;background-color: yellow;text-align: center"><?php if ($dtwo!=null){echo $dtwo->telp_wo;}?></code>
                    </td></tr>
                    <tr>
                    <td><code style="font-size: 20px;color: black;background-color: yellow;text-align: center"><?php if ($dtwo!=null){echo $dtwo->alamat_wo;}?></code> 
                    </td></tr>
                    </tbody>
									</table>
                </div>
            </div>
            <div class="css-treeview" style="background-color: yellow">
                <h4 style="background-color: black">Kategori</h4>
                <div class="col-md-12 agileits-w3layouts" style="background-color: yellow"> 
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>Kategori</th> 
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allkat as $r){?>

                    <tr><td>
											<a href="<?php echo base_url("paket/index/".$r->id_kategori."/".$idwo."/1/".$q);?>" style="font-size: 20px;color: black;background-color: yellow;text-align: center"><?php echo $r->kategori;?></a>
                    <?php }?>   
                    </td></tr>
										</tbody>
									</table>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">
            <h5>Daftar Paket <?php if ($kat!='all'){echo $this->M_data->data("tbl_kategori",array("id_kategori"=>$kat))->row()->kategori;}?></h5>
            <div class="men-wear-top">
                
                <div  id="top" class="callbacks_container">
                     
                </div>
                <div class="clearfix"></div>
            </div>
              <?php	foreach ($paket as $r){?>
                <div class="col-md-4 product-men">
                  <div class="men-pro-item simpleCart_shelfItem">
                      <div class="men-thumb-item">
                          <img src="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_foto",array("id_paket"=>$r->id_paket))->row()->foto)?>" alt="" class="pro-image-front" style="width: 100%;height: 170px">
                          <img src="<?php echo base_url("foto/paket/".$this->M_data->data("tbl_wo",array("id_wo"=>$r->id_wo))->row()->foto)?>" alt="" class="pro-image-back">
                              <div class="men-cart-pro">
                                  <div class="inner-men-cart-pro">
                                      <a href="<?php echo base_url("paket/rinci/".$r->id_paket)?>" class="link-product-add-cart">Quick View</a>
                                  </div>
                              </div>
                              <span class="product-new-top">New</span>
                              
                      </div>
                      <div class="item-info-product ">
                          <h4 style="height: 30px"><a href="#" ><?php $nama_paket = strip_tags($r->nama_paket);echo substr($nama_paket,0,35);?></a></h4>
                          <div class="info-product-price"> 

                            <span class="item_price"><?php echo "Rp ".number_format($r->total_harga,0," ",".");?></span>
                            <?php if ($r->diskon!=0){?>
                            <del><?php echo "Rp ".number_format($r->harga,0," ",".");?></del>
                            <?php }?>
                            <!--
                            <del>$69.71</del>
                            -->
                          </div>
                          <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                            <form action="#" method="post">
                              <fieldset> 
               
																<a href="<?php echo base_url("paket/rinci/".$r->id_paket)?>">
																	<input type="button" name="button" value="Lihat Paket" class="button" style="background-color: black"/>
																</a>
                              </fieldset>
                            </form>
                          </div>
                      </div>
                  </div>
              </div>
							<?php }?>
							<div class="row">
								<div class="col-md-12"><hr><?php if ($totpk>0){?>
				<div class="btn-group">
	        <button class="btn btn-default" onclick="kehal('1')" type="button"><<</button>
					<?php
	          //Disini Proses Pagingnya...
	          $i=-1;
	          if ($this->uri->segment(5)==null){$hlm=1;}else{$hlm=$this->uri->segment(5);}
	          if ($totpk>2){$n=1; if ($hlm==$totpk){$n=$n-1;$i=-2;}}else{$n=$totpk-2;}
	          for ($i;$i<=$n;$i++){
	            if ($hlm>=2){$hal=$hlm+$i;}else{$hal=$hlm+$i+1;}
	        ?>
	          <button class="btn btn-<?php if ($hal==$hlm){echo "primary active";}else{echo "default";}?>" onclick="kehal('<?php echo $hal?>')" type="button"><?php echo $hal?></button>
	        <?php }?>
					<button class="btn btn-default" onclick="kehal('<?php echo $totpk?>')" type="button">>></button>
					</div><?php }else{echo "<center><i>Tidak ditemukan paket</i></center>";}?>
                </div>
              </div>
        </div> 
    
    </div>
</div>
<script>
	function kehal(a){
	  location.href="<?php echo base_url().'paket/index/'.$kat.'/'.$idwo?>/"+a+"/<?php echo $q?>";
	}
</script>