<?php $ftbl=json_decode($tabel->tabel);?>
<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>DATA <?php echo ucwords($tabel->nm_tmp)?></h3></div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading widget-shadow">
				<!--<button type="button" class="btn btn-primary btn-flat btn-pri pull-right" onclick="tmbtbl('<?php //echo $tabel->nama_tbl?>')"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>-->
				<h3 class="panel-title"><i class="fa fa-th-list"></i> Data <?php echo ucwords($tabel->nm_tmp)?></h3>
			</div>
			<div class="panel-body">
				
				<table class="table">
					<tr>
						<th>#</th>
						<?php foreach ($ftbl as $k => $v){
							if($v->ai=='Y' or $v->edt=='5' or $k=='foto' or $k=='map' or $k=='deskripsi_wo' or $k=='rek_wo' or $k=='rincian'){}else{
							if ($k=='kd_kpe'){$lb='Komp. Pembiayaan';}else
							if ($k=='kd_kpr'){$lb='Komp. Program';}else{$lb=$k;}?>
						<th><?php echo ucwords(str_replace('_',' ',$lb))?></th>
						<?php }}?>
						<th></th>
					</tr>
					<?php $n=0; foreach($dtbl as $r){$n++;?>
						<tr>
							<td><?php echo $n?></td>
							<?php $rjk1=''; foreach ($ftbl as $k => $v){
								if ($v->pk=='Y'){$rjk1=$r->$k;}
								if($v->ai=='Y' or $v->edt=='5' or $k=='foto' or $k=='map' or $k=='deskripsi_wo' or $k=='rek_wo' or $k=='rincian'){}else{
								
								$rcn=$r->$k;
								if ($v->edt=='1'){if($k=='harga' || $k=='total_harga'){$rcn='Rp. '.number_format($r->$k,0,',','.');}else if ($k=='diskon'){$rcn=$r->$k.'%';}}else
								if ($v->edt=='2'){$rcn=date('d-m-Y',$r->$k);}else
								if ($v->edt=='4'){$rcn=aoc_des($r->$k);}else
								if ($v->edt=='5'){$rcn="<i class='fa fa-image'><i/>";}else
								if ($v->edt=='6'){$rcn=substr($r->$k,0,15).'..';}else
								if ($v->edt=='7'){
									//$rcreftbl=$this->db->field_data($v->ref->tblr);
									$rcreftbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$v->ref->tblr))->row()->tabel);
									$tpref=$v->ref->tmpr;
									$whr=array();
									foreach($rcreftbl as $kk => $vv){
										if ($vv->pk=='Y'){$whr[$kk]=$r->$k;}
									}
									$dref=$this->M_data->cari($v->ref->tblr,$whr,'and')->row();
									$rcn=substr($dref->$tpref,0,20).'..';
								}
							?>
							<td><?php echo $rcn?></td>
							<?php }}?>
							<td align="right">
								<!--<a type="button" class="btn btn-info btn-xs" href="<?php //echo base_url('admin/rinci/'.$tabel->nama_tbl.'/'.$rjk1)?>"><i class="fa fa-eye"></i> Rincian</a>-->
								<?php if ($tabel->nama_tbl=='tbl_paket'){?>
								<a type="button" class="btn btn-info btn-xs" href="<?php echo base_url('admin/data_foto/'.$r->id_paket)?>"><i class="fa fa-picture-o"></i> Foto</a>
								<?php }?>
								<button type="button" class="btn btn-warning btn-xs" onclick="ubahtbl('<?php echo $tabel->nama_tbl?>','<?php echo $rjk1?>')" title="Ubah"><i class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" onclick="hpstbl('<?php echo $tabel->nama_tbl?>','<?php echo $rjk1?>')" title="Hapus"><i class="fa fa-minus"></i></button>
							</td>
						</tr>
					<?php }?>
				</table>
			</div>
			<div class="panel-footer">
				<div class="btn-group">
	        <button class="btn btn-default" onclick="kehal('1')" type="button"><<</button>
					<?php
	          //Disini Proses Pagingnya...
	          $i=-1;
	          if ($this->uri->segment(4)==null){$pg=1;}else{$pg=$this->uri->segment(4);}
	          if ($tothal>2){$n=1; if ($pg==$tothal){$n=$n-1;$i=-2;}}else{$n=$tothal-2;}
	          for ($i;$i<=$n;$i++){
	            if ($pg>=2){$hal=$pg+$i;}else{$hal=$pg+$i+1;}
	        ?>
	          <button class="btn btn-<?php if ($hal==$pg){echo "primary active";}else{echo "default";}?>" onclick="kehal('<?php echo $hal?>')" type="button"><?php echo $hal?></button>
	        <?php }?>
					<button class="btn btn-default" onclick="kehal('<?php echo $tothal?>')" type="button">>></button>
	      </div>
			</div>
		</div>
		
	</div>
	<div class="clearfix"></div>
</div>
<script>
	function ubahtbl(a,b){
		$("#mBantu").modal("show");
		$.ajax({
			method: "POST",
			data : {b},
			url: "<?php echo base_url('form_bantu/tabel')?>/"+a+"/ubah"
		})
		.done(function( msg ) {
			if (msg!=""){
				$("#fbody").html(msg);
				$(".ambltgl").datepicker({autoclose: true});
				//$("#mBantu").modal("show");
			}else{$.notify({title:"<b>Gagal Memuat Form.!!</b>",message:"<br>Mohon ulangi beberapa saat lagi.!!"},{type:"warning",timer: 4000,placement: {from: "top",	align: "right"}})}
		});
	}
	function hpstbl(a,b){
		var r=confirm("Yakin ingin menghapus data ini.??");
		if (r == true) {
			$.ajax({
				method: "POST",
				data : {b},
				url: "<?php echo base_url('proses/hapus_data_tbl')?>/"+a
			})
			.done(function( msg ) {
				$.notify({title:"<b>Suksess.!!</b>",message:"<br>Data berhasil dihapus.!!<br>Mohon Refresh Halaman.."},{type:"success",timer: 4000,placement: {from: "top",	align: "right"}});
			});
		}
	}
	function kehal(a){
	  location.href="<?php echo base_url().'hal/tabel/'.aoc_enc($nmtbl)?>/"+a;
	}
</script>