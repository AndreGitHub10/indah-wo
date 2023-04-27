<div class="col-lg-12 main-chart">
	<div class="border-head">
		<h3>LAPORAN WO <a href="<?php echo base_url('admin/cetak/wo')?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Cetak</a></h3>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered table-striped" id="dtabel">
                            <thead>
                              <tr style="background-color: #c4c4ff;color:white"> 
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Nama wo</th>
                                <th>Deskripsi wo</th> 
                                <th>Rek wo</th>
                                <th>Email</th>
                                <th>Status</th> 
                              </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;
                                foreach($this->M_data->data("tbl_wo")->result() as $r){
                            ?>
                            <tr style="background-color: white"> 
                                <td style="background-color: white"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_pemilik; ?></td>                               
                                <td><?php echo $r->nama_wo; ?></td>                               
                                <td><?php echo $r->deskripsi_wo; ?></td>                               
                                <td><?php echo $r->rek_wo; ?></td>                               
                                <td><?php echo $r->email; ?></td>                               
                                <td><?php echo $r->status; ?></td>                               
                                 
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
		</div>
	</div>
</div>