<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Form_bantu extends CI_Controller {
		
		function tabel($nmtbl,$tp){
			$fldtbl=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$nmtbl))->row()->tabel);
			$field=array();
			
			if ($tp=='baru'){
				$actionform=base_url("proses/tmbh_data_tbl/".$nmtbl);
				$jdlform="<i class='fa fa-plus-square'></i> Tambah Data Baru";
				
				foreach ($fldtbl as $k=>$v){
					if($v->ai=='Y' or $v->edt=='5'){}else{$field[$k]="";}
				}
			}else{
				$actionform=base_url("proses/ubah_data_tbl/".$nmtbl);
				$jdlform="<i class='fa fa-edit'></i> Ubah Data Tabel";
				
				$rjk1=$this->input->post('b');
				$whr=array(); 
				//$fdt=explode(';',$rjk1);$n=0;
				foreach($fldtbl as $k=>$v){if($v->pk=='Y'){$whr[$k]=$rjk1;}}
				$dtbl=$this->M_data->data($nmtbl,$whr)->row();
				
				foreach ($fldtbl as $k=>$v){
					if($v->ai=='Y' or $v->edt=='5'){}else{$field[$k]=$dtbl->$k;}
				}
			}
		?>
		<form role="form" action="<?php echo $actionform?>" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo $jdlform?></h4>
				<?php if ($tp!='baru'){?><input type="text" name="rjk1" value="<?php echo $rjk1?>" hidden="hidden"><?php }?>
			</div>
			<div class="modal-body"><div class="row">
				<?php 
					foreach ($fldtbl as $k=>$v){
						if($v->ai=='Y' or $v->edt=='5' or $k=='foto'){}else{
							$aw=strpos($v->jns,'('); $ah=strpos($v->jns,')');
							$jns=substr($v->jns,0,$aw); $pjg=substr($v->jns,$aw+1,$ah-$aw-1);
							if ($v->edt=='1'){$tpe='number';}else
							if ($v->edt=='3'){$tpe='email';}else
							if ($v->edt=='4'){$tpe='password';}else
							if ($v->edt=='5'){$tpe='file';}else{$tpe='text';}
							
							$lb=$k; $jnsprd="";
							if ($v->ref!=''){
								$tblref=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$v->ref->tblr))->row()->tabel);
								$tpsl=$v->ref->tmpr;
								foreach($tblref as $k2 => $v2){
									if ($v2->pk=="Y"){$vsl=$k2;}
								}
							}
							
							if ($v->edt=='2'){
								if ($field[$k]!=''){$valtxt=date("d-m-Y",$field[$k]);}else{$valtxt=date("d-m-Y");}
								}else if ($v->edt=='4'){
								$valtxt=aoc_des($field[$k]);
							}else{$valtxt=$field[$k];}
						?>
						<div class="form-group <?php if ($jns=='text' or $jns=='TEXT' or $pjg>50){echo "col-sm-12";}else{echo "col-sm-6";}?>">
							<label for=""><?php echo ucwords(str_replace('_',' ',$lb))?></label>
							<?php if ($v->edt=='7'){?>
								<select class="form-control" id="<?php echo $k?>" name="<?php echo $k?>" <?php echo $jnsprd?>>
									<option>-pilih-</option>
									<?php foreach($this->M_data->data($v->ref->tblr)->result() as $r3){?>
										<option value="<?php echo $r3->$vsl?>" <?php if ($r3->$vsl==$field[$k]){echo 'selected';}?>><?php echo $r3->$tpsl?></option>
									<?php }?>
								</select>
								<?php }else if ($v->edt=='6'){?>
								<textarea id="<?php echo $k?>" name="<?php echo $k?>" class="form-control teksedt" maxlength="<?php echo $pjg?>"><?php echo $field[$k]?></textarea>
								<?php }else{?>
								<input type="<?php echo $tpe?>" id="<?php echo $k?>" name="<?php echo $k?>" class="form-control <?php if ($v->edt=='2'){echo 'ambltgl';}?>" value="<?php echo $valtxt?>" maxlength="<?php echo $pjg?>">
							<?php }?>
						</div>
					<?php }}?>
			</div></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>
		<script>$(function () {$(".teksedt").wysihtml5();});$(".ambltgl").datetimepicker({timepicker:false,format:'d-m-Y'});</script>
		<?php
		}
		
		function vref($rjk,$no){
			$dt=json_decode($this->M_data->data("master_tbl",array("nama_tbl"=>$rjk))->row()->tabel);
		?>
		<select class="form-control" name="valref<?php echo $no?>">
			<?php foreach($dt as $k=>$v){?>
				<option value="<?php echo $k?>"><?php echo $k?></option>
			<?php }?>
		</select>
		<?php
		}
		
		function daftar_trans($tgl1=null,$tgl2=null){
			if ($tgl1==null){
				$dt1=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_transaksi
                               WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                               AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                               GROUP BY tbl_keranjang.id_transaksi
                               ORDER BY tbl_transaksi.id_transaksi DESC")->result();
			}else{
				$tgl1=date("Y-m-d",strtotime($tgl1));
				$tgl2=date("Y-m-d",strtotime($tgl2));
				
				$dt1=$this->db->query("SELECT * FROM tbl_paket,tbl_keranjang,tbl_transaksi
                               WHERE tbl_paket.id_paket=tbl_keranjang.id_paket
                               AND tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi
                               AND tbl_transaksi.tgl_transaksi 
                               BETWEEN '$tgl1' AND '$tgl2'
                               GROUP BY tbl_keranjang.id_transaksi
                               ORDER BY tbl_transaksi.id_transaksi DESC")->result();
			}
			?>
			<table class="table table-bordered table-striped" id="dtabel">
                            <thead style="background-color:white;">
                              <tr> 
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama WO</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Tujuan Pengiriman</th> 
                                <th>Rincian</th> 
                                <th>Status</th>
								<th>Uang masuk</th>
                            	<th>Sisa Pembayaran</th>  
                                <th>Aksi</th>
                              </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no  = 1;
                                foreach($dt1 as $r){
                                  $idwo = $r->id_wo;
                                  $idtran = $r->id_transaksi;
                                  $catatan  = $r->catatan;

                                  $nama_wo = $this->M_data->data("tbl_wo",array("id_wo"=>$idwo))->row()->nama_wo;
																	
																	$id_prov    = $r->id_prov;
                                  $id_kabkot  = $r->id_kabkot;
                                  $id_kec     = $r->id_kec;

                                  $nama_prov  = $this->M_data->data("tbl_prov",array("id_prov"=>$id_prov))->row()->nama_prov;

																	$dtkk=$this->M_data->data("tbl_kabkot",array("id_kabkot"=>$id_kabkot))->row();
                                  $nama_kabkot  = $dtkk->nama_kabkot;
                                  

                                  $nama_kec  = $this->M_data->data("tbl_kec",array("id_kec"=>$id_kec))->row()->nama_kec;  

                                  $total_transaksi = $r->total_transaksi;

                                  $totalnya = $total_transaksi;
								  $jumlah_dp = $r->jumlah_dp;
                                  $sisa_pembayaran = $r->sisa_pembayaran;
                            ?>
                            <tr> 
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$r->id_pelanggan))->row()->nama_pelanggan?></td>
                                <td><?php echo $nama_wo?></td>
                                <td><?php echo $idtran?></td>
                                <td><?php echo $r->tgl_transaksi?></td>
                                <td><?php echo "Rp ".number_format($totalnya,0,",",".")?></td> 
                                <td><?php echo $nama_prov." - ".$nama_kabkot." - ".$nama_kec;?></td>
                                <td><?php echo $catatan?></td>
                                <td><?php echo $r->status?></td>
								<td><?php echo $r->jumlah_dp?></td>
                            	<td><?php echo "Rp ".number_format($sisa_pembayaran,0,",",".");?></td>
                                <td>
                                    <a href="<?php echo base_url("admin/detail_paket/".$idtran);?>">
                                    <button class="btn btn-xs btn-primary" title="edit"><i class="fa fa-gift"></i> Detil</button>
                                    </a>
									<a href="<?php echo base_url("proses/hapus_trans/".$idtran);?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    <button class="btn btn-xs btn-danger" title="edit"><i class="fa fa-trash-o"></i> Hapus</button>
                                    </a>
                                    <?php if ($r->bukti_transaksi==null){ ?>
                                      <a href="#">
                                    </a>
                                    <?php } else {?>
                                    
                                    <button type="button" class="btn btn-xs btn-success" onclick="bukti('<?php echo base_url("foto/bukti/".$r->bukti_transaksi)?>','<?php echo $r->bank.' ('.$r->tgl_pembayaran.')'?>')"><i class="fa fa-eye"></i> Bukti Transaksi</button>

                                    <?php } if ($r->status!='Lunas'){?>
                                    </a>
                                    <a href="<?php echo base_url("admin/transaksi/".$idtran."/Lunas");?>" onclick="return confirm('Apakah anda yakin pembayaran sudah lunas?')">
                                    <button class="btn btn-xs btn-success" title="edit"><i class="fa fa-check"></i> Lunas</button>
                                    </a>
									<a href="<?php echo base_url("admin/transaksi/".$idtran."/Dp");?>" onclick="return confirm('Apakah anda yakin sudah menerima pembayaran Dp?')">
                                    <button class="btn btn-xs btn-success" title="edit"><i class="fa fa-check"></i> Terima Dp</button>
                                    </a>
									<button type="button" class="btn btn-default" onclick="inputdp('<?php echo $idtran?>')"><i class="fa fa-clock-o"></i> Input Pembayaran</button>
                                   
                                    <?php }?>
                                </td>
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
                    </table>
	<script>
		function GetxhrObject(){
			var xhr=null;
			try {xhr=new XMLHttpRequest();}
			catch (e){
				try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
				catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
			}
			return xhr;
		};
		function bukti(gmb,ref){
			$("#fbody").html("<center><img src='"+gmb+"' height='450px'></center>");
			$("#refbukti").html(ref);
			$("#mBantu").modal("show");
		}
		
		function inputdp(id_transaksi){
			$("#fbody").html("<form action='<?php echo base_url()?>admin/transaksi/"+id_transaksi+"' method='post' enctype='multipart/form-data'>"+
            "<input type='int' name='jumlah_dp' class='form-control' placeholder='jumlah Pembayaran' required><br>"+
			"<button type='submit' class='btn btn-success'>Input Pembayaran</button></form>");
			$("#refbukti").html("Input Jumlah Pembayaran Sesuai Bukti Transfer");
			$("#mBantu").modal("show");
		}
	</script>
			<?php
		}
	}		