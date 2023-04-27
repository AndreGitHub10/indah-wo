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
                    <form action="<?php echo base_url('proses/ubah_profil/wo/'.$dtprof->id_wo)?>" method="POST" class="form-horizontal style-form" enctype="multipart/form-data"> 
                          <input type="hidden" name="id_wo" class="form-control" required="" value="<?php echo $dtprof->id_wo?>" placeholder="">
                              <h2 class="text-center">Profil Wedding Organizer</h2>
                              <p>&nbsp;</p>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Nama Pemilik</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="nama_pemilik" class="form-control" required="" value="<?php echo $dtprof->nama_pemilik?>" placeholder="">
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Nama wo</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="nama_wo" class="form-control" required="" value="<?php echo $dtprof->nama_wo?>" placeholder="">
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Deskripsi wo</label>
                                  <div class="col-md-6 col-xs-11">  
                                  <textarea name="deskripsi_wo" class="form-control" required=""><?php echo $dtprof->deskripsi_wo?></textarea>
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Alamat</label>
                                  <div class="col-md-6 col-xs-11">  
                                  <textarea name="alamat_wo" class="form-control" required=""><?php echo $dtprof->alamat_wo?></textarea>
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">No Telepon</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="telp_wo" class="form-control" required="" value="<?php echo $dtprof->telp_wo?>" placeholder="">
                                  </div>
                              </div>
                             
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Rek wo</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="rek_wo" class="form-control" required="" value="<?php echo $dtprof->rek_wo?>" placeholder="">
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Atas Nama</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="atas_nama" class="form-control" required="" value="<?php echo $dtprof->atas_nama?>" placeholder="">
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Email</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="text" name="email" class="form-control" required="" value="<?php echo $dtprof->email?>" placeholder="">
                                  </div>
                              </div>
                               <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Password</label>
                                  <div class="col-md-3 col-xs-11">  
                                  <input type="password" name="password" class="form-control" value="" placeholder="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3">Foto </label>
                                  <div class="col-md-6 col-xs-11">  
                                      <input type="hidden" value="<?php echo $dtprof->foto?>" name="foto" class="form-control"/>
                                      <input type="file" value="" name="foto" class="form-control"/>
                                  </div>
                              </div>
                              <div class="form-group" enctype="multipart/form-data">
                                  <label class="control-label col-md-3">Map</label>
                                  <div class="col-md-6 col-xs-11">  
                                  <textarea name="map" class="form-control"><?php echo $dtprof->map?></textarea>
                                  </div>
                              </div>

                              <!--
                              <div class="form-group">
                                  <label class="control-label col-md-3">Default Datepicker</label>
                                  <div class="col-md-3 col-xs-11">  
                                      <input type="text" value="<?php //echo date('Y-m-d')?>" id="datetimepicker" class="form-control"/>
                                  </div>
                              </div>
                            -->
                              <div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-9">
                                      <button class="btn btn-success" type="submit">Simpan</button> 
                                      <button class="btn btn-primary" type="button" onclick="self.history.back()">Kembali</button> 
                                  </div>
                              </div> 
                          </form>
                </div>
            </div>
        </div>
    </div>