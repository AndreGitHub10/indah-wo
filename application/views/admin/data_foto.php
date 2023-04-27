    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb"> 
                    </ol>
                </div>
            </div>
             
  </script>
            <div class="row confirm">
                <div class="col-md-12">
                    <h2 class="text-center">FOTO PAKET <u><?php echo $this->M_data->data("tbl_paket",array("id_paket"=>$idpkt))->row()->nama_paket?></u> <i class="fa fa-gift"></i></h2>
                    <br>
                    <a href="<?php echo base_url("admin/hal/paket")?>">
             <button class="btn btn-success" type="button"><i class="fa fa-arrow-left"></i> Kembali</button> 
            </a>
            <button class="btn btn-success" type="button" onclick="upfoto('baru','<?php echo $idpkt?>')"><i class="fa fa-plus"></i> Tambah Foto</button> 
            <p>&nbsp;</p>
                    <div class="box-body table-responsive">
                    
                     <table id="example1"  class="table table-bordered table-striped" >
                            <thead>
                            <tr style="background-color: #c4c4ff;color:white"> 
                                <th>No</th>  
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($dtfoto as $r){?>
                            <tr style="background-color:white"> 
                                <td style="background-color:white"><?php echo $no++.".".$r->id_foto;?></td>  
                                <td>
                                <a href="<?php echo base_url("foto/paket/".$r->foto)?>" target="_blank">
                                    <img src="<?php echo base_url("foto/paket/".$r->foto)?>" widht="100px" height="100px">
                                </a>
                            </td>
                                
                                <td>
                                    <button class="btn btn-xs btn-info" title="edit" onclick="upfoto('<?php echo $r->id_foto;?>','<?php echo $idpkt?>','<?php echo base_url("foto/paket/".$r->foto)?>')"><i class="fa fa-edit"></i></button>

                                    <a href="<?php echo base_url("foto/hapus/".$r->id_foto."/".$r->id_paket);?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?') ";>
                                    <button class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash-o"></i></button>
                                    </a>
                                </td>
                                
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
                            </table>
                </div>
                </div>
            </div>
        </div>
    </div>
		
<div class="modal fade" id="mfoto" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<form id="fupfoto" action="" method="POST" class="form-horizontal style-form" enctype="multipart/form-data"> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body modal-body-sub_agile">
						
              <div class="form-group">
                <label class="control-label col-md-2">Foto</label>
                <div class="col-md-8 col-xs-10">
                  <input type="file" id="foto" name="foto" class="form-control" onchange="bacaGambar(this)" required="" accept="image/*">
                </div>
              </div>
							<center><img src="" id="prevfoto" width="90%"></center>
					</div>
					<div class="modal-footer">
							<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-success" type="submit">Simpan</button>
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                </div>
              </div>
					</div>
					</form>
				</div>
			</div>
		</div>
		
<script>
	function upfoto(a,b,c=null){
		if (a=='baru'){
			$("#fupfoto").attr("action","<?php echo base_url('foto/tambah')?>/"+b);
		}else{
			$("#fupfoto").attr("action","<?php echo base_url('foto/ubah')?>/"+a+"/"+b);
		}
		$("#prevfoto").attr("src",c);
		$("#foto").val("");
		$("#mfoto").modal("show");
	}
	
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#prevfoto').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
		}
	}
</script>