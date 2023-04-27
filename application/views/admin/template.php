<!DOCTYPE html>
<?php $this->M_proses->validasi();?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $jdlapp;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/bootstrap/css/bootstrap.min.css">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/bootstrap/css/icons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/dist/css/skins/_all-skins.min.css">

	<!--- Plugins -->
	<link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/datatables/dataTables.bootstrap.css">
	<!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/datepicker/datepicker3.css">
	<!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	
	<link rel="icon" href="<?php echo base_url('assets')?>/front-end/images/logo.png">
	
	<!-- jQuery 2.2.0 -->
	<script src="<?php echo base_url('assets')?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets')?>/plugins/jQueryUI/jquery-ui.min.js"></script>
	
	<script src="<?php echo base_url()?>assets/plugins/goodchars.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url('assets')?>/front-end/images/logo.png" width="42px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url('assets')?>/front-end/images/logo.png" width="48px"> <b>Wedding</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
					<li><a href="<?php echo base_url("admin/keluar")?>"><span class="btn btn-danger" style="margin:-10px 0"><i class="fa fa-sign-out"></i> Keluar</span></a></li>
				</ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
			<?php
			$logoprof="user.png";
			?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/'.$logoprof)?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper(aoc_des($this->session->userdata(aoc_enc('Nama'))))?></p>
          <!-- Status -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="<?php echo base_url("admin")?>"><i class="fa fa-dashboard"></i> <span>DASHBOAR</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/hal/kategori')?>"><i class="fa fa-file"></i> <span>KATEGORI</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/hal/paket')?>"><i class="fa fa-gift"></i> <span>PAKET</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/transaksi')?>"><i class="fa fa-shopping-cart"></i> <span>TRANSAKSI PEMESANAN</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/hal/wo')?>"><i class="fa fa-building"></i> <span>WO</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/hal/pelanggan')?>"><i class="fa fa-users"></i> <span>PELANGGAN</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/hal/admin')?>"><i class="fa fa-user"></i> <span>USER</span></a></li>
        <li class=""><a href="<?php echo base_url('admin/laporan')?>"><i class="fa fa-file"></i> <span>LAPORAN</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $jdlhal;?>
        <small><?php //echo $deshal;?></small>
      </h1>
      <ol class="breadcrumb"></ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php echo $contents;?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php if (aoc_des($this->session->userdata(aoc_enc("UserLvl")))=='0'){?>
	<div id="mTpa" class="modal modal-info fade" tabindex="-1" role="dialog" aria-labelledby="HapusKelas" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header"><h4><i class="fa fa-question-circle"></i> Konfrmasi..</h4></div>
								<div class="modal-body">
									<center>
									<a href="<?php echo base_url('proses/gantiTP/sblm')?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Semester Sebelumnya</a> &nbsp;&nbsp;Atau&nbsp;&nbsp; 
									<a href="<?php echo base_url('proses/gantiTP/lnjt')?>" class="btn btn-success">Lanjut Semester Baru <i class="fa fa-arrow-right"></i></a>
									</center>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
								</div>
							</div>
						</div>
					</div>
	<?php }?>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>2018 - Velita Nur Anggraini
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets')?>/bootstrap/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets')?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets')?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets')?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets')?>/dist/js/app.min.js"></script>

<script src="<?php echo base_url('assets')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/bootstrap-notify.js"></script>
<script>
	$("#dtsiswa").DataTable();
	$(".ambltgl").datepicker({autoclose: true});
	$(function () {$(".teksedt").wysihtml5();})
	function GetxhrObject(){
		var xhr=null;
		try {xhr=new XMLHttpRequest();}
		catch (e){
			try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
			catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
		}
		return xhr;
	};
		<?php if ($this->session->flashdata('alert_jdl') != null){?>
			$.notify({
				title: "<h4><?php echo $this->session->flashdata('alert_jdl')?></h4>",
				message: "<?php echo $this->session->flashdata('alert_pesan')?>"
			},{
				type: "<?php echo $this->session->flashdata('alert_jns')?>",
				timer: 4000,
				placement: {
					from: "top",
					align: "right"
				}
			});
		<?php }?>
	function gantitp(){$("#mTpa").modal("show");}
</script>
</body>
</html>