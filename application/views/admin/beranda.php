<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>DASHBOARD</h3></div>
	<div class="row">
		<div class="col-md-3 mb">
			<div class="twitter-panel pn">
				<i class="fa fa-user fa-4x"></i>
				<p>Jumlah Pelanggan</p>
				<p class="user" style="font-size: 50px"><?php echo $this->M_data->data("tbl_pelanggan")->num_rows()?></p>
			</div>
		</div>
		
		<div class="col-md-3 mb">
			<div class="twitter-panel pn">
				<i class="fa fa-user fa-4x"></i>
				<p>Jumlah Paket</p>
				<p class="user" style="font-size: 50px"><?php echo $this->M_data->data("tbl_paket")->num_rows()?></p>
			</div>
		</div>
		
		<div class="col-md-3 mb">
			<div class="twitter-panel pn">
				<i class="fa fa-user fa-4x"></i>
				<p>Jumlah Transaksi</p>
				<p class="user" style="font-size: 50px"><?php echo $this->M_data->data("tbl_transaksi")->num_rows()?></p>
			</div>
		</div>
	</div>
</div>