<?php
	if($idpkt==null){
		$jdl_form="TAMBAH PAKET";
		$aksi=base_url("paket/ptambah/");
		$nama_paket="";
		$id_kategori="";
		$harga="";
		$diskon="";
		$rincian="";
	}else{
		$jdl_form="UBAH PAKET";
		$aksi=base_url("paket/pedit/".$idpkt);
		$dtpkt=$this->M_data->data("tbl_paket",array("id_paket"=>$idpkt))->row();
		$nama_paket=$dtpkt->nama_paket;
		$id_kategori=$dtpkt->id_kategori;
		$harga=$dtpkt->harga;
		$diskon=$dtpkt->diskon;
		$rincian=$dtpkt->rincian;
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
					<form class="form-horizontal" method="post" action="<?php echo $aksi?>" name="form1" enctype="multipart/form-data">
					
					  	<h3 class="text-center"><?php echo $jdl_form?></h3>
					  	<hr>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama paket</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="nama_paket" style="background-color: white" value="<?php echo $nama_paket?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Kategori paket</label>
							<div class="col-sm-6">
							  <select  class="form-control" id="id_kategori" style="background-color: white" name="id_kategori" required="">
							  <?php foreach ($this->M_data->data("tbl_kategori")->result() as $r){?>
									<option value="<?php echo $r->id_kategori?>" <?php if ($r->id_kategori==$id_kategori){echo "selected";}?>><?php echo $r->kategori?></option>
							  <?php }?>
							  </select>
							</div>
						</div> 
						 	

						<div class="form-group">
							<label class="col-sm-3 control-label">Harga</label>
							<div class="col-sm-6">
							  <input type="number" class="form-control" name="harga" style="background-color: white" value="<?php echo $harga?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Diskon (%)</label>
							<div class="col-sm-6">
							  <input type="number" class="form-control" name="diskon" style="background-color: white" value="<?php echo $diskon?>">
							</div>
						</div> 
 						<div class="form-group">
							<label class="col-sm-3 control-label">Rincian paket</label>
							<div class="col-sm-6">
							  <textarea id="product_desc_long" name="rincian" class="form-control summernote"><?php echo $rincian?></textarea> 
							</div>
						</div>
						

						<div class="form-group">
						    <div class="col-sm-offset-3 col-sm-10">
						      <button type="submit" class="btn btn-green">SIMPAN</button>
						      
						      <button type="reset" class="btn btn-green" onclick="self.history.back()">KEMBALI</button>
						      
						    </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	