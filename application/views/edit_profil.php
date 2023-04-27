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
                    <form class="form-horizontal" method="post" action="<?php echo base_url('proses/ubah_profil/pel/'.$dtprof->id_pelanggan)?>" name="form1" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_pelanggan" style="background-color: white" value="<?php echo $dtprof->id_pelanggan?>" required>

                    <input type="hidden" class="form-control" name="level" style="background-color: white" value="<?php echo $dtprof->level?>" required>
                    
                        <h3 class="text-center">PROFIL</h3>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" name="nama" style="background-color: white" value="<?php echo $dtprof->nama_pelanggan?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-6">
                              <textarea class="form-control" rows="8"  name="alamat" style="background-color: white"><?php echo $dtprof->alamat?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">No Telpon</label>
                            <div class="col-sm-6">
                              <input type="number" class="form-control" name="no_telp" style="background-color: white" value="<?php echo $dtprof->no_telp?>" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                              <input type="email" class="form-control" name="email" style="background-color: white" value="<?php echo $dtprof->email?>" required>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                              <input type="password" class="form-control" name="password" style="background-color: white" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Foto </label>
                          <div class="col-md-6 col-xs-11">  
                              <input type="hidden" value="<?php echo $dtprof->foto?>" name="foto" class="form-control"/>
                              <input type="file" value="" name="foto" class="form-control"/>
                          </div>
                      </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                              <button type="submit" class="btn btn-success">EDIT</button>
                              
                              <button type="reset" class="btn btn-primary" onclick="self.history.back()">KEMBALI</button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>