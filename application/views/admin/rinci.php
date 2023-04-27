<div class="col-lg-12 main-chart">
	<div class="border-head"><h3>RINCIAN DATA</h3></div>
	<div class="panel panel-default">
		<div class="panel-heading widget-shadow" align="center">
			<h3 class="panel-title"><i class="fa fa-th-list"></i> Rincian Data</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
			<?php foreach($rcndata as $k => $v){?>
				<tr>
					<td><?php echo $k?></td>
					<th>
						<?php 
							if ($k=='password'){
								echo aoc_des($v);
							}else if ($k=='foto'){
								echo "<img src='".base_url('foto/'.substr($nmtbl,4).'/'.$v)."' width='240px'>";
							}else{echo $v;}?>
					</th>
				</tr>
			<?php }?>
			</table>
		</div>
	</div>
</div>