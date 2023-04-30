<!DOCTYPE html>
<?php //$this->M_proses->validasi();?>
<html>
 
<head>
<title>Wedding Organizer</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/front-end/images/favicon.ico">
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/bootstrap.css" /> 	
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/jquery.datetimepicker.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/flexslider.css"   />
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/style.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/font-awesome.css" > 
<link rel='stylesheet' href="<?php echo base_url()?>assets/front-end/css/easy-responsive-tabs.css"  type='text/css'/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- //for bootstrap working -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<?php if ($pg=='input_paket' || $pg=='edit_paket'){?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/summernote.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/front-end/css/summernote-bs3.css">
<?php	}?>
<style>
.rating input[type="radio"] {
  display: none;
}
.rating label.checked i,
i.checked {
  color: yellow;
}
.rating-box {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
.comment-box {
  position: relative;
  /* other styles */
}

.comment-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  max-height: 44px; /* 2 lines * line-height */
  min-height: 44px;
}
</style>
</head>
<body> 
<!-- header-bot -->
<div class="header-bot" id="home" style="background-color: yellow">
	<div class="header-bot_inner_wthreeinfo_header_mid">
      <div class="col-md-3 header-middle"> 
      	<?php
      		
					if ($this->session->userdata(aoc_enc("Level"))=='1'){$nmLvl='Pelanggan';}else{$nmLvl='WO';}
					if (!$this->session->has_userdata(aoc_enc('UserID'))){
				?>
					<a href="#" data-toggle="modal" data-target="#myModal">
	      			<button class="btn btn-primary"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</button>
	      		</a>


	      		<a href="#" data-toggle="modal" data-target="#myModal2">
	      			<button class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i> Daftar</button>
	      		</a> 
	      		<?php
	      			} else {
	      		?>
	      		<a href="<?php echo base_url("index/logout")?>">
	      			<button class="btn btn-primary"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</button>
	      		</a>
	      		<a href="<?php echo base_url("index/profil")?>">
	      			<button class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $nmLvl?> / <?php echo ucfirst($this->session->userdata(aoc_enc("Nama")))?></button>
	      		</a>
	      		<?php
	      			}
	      		?>
		</div>
		
		<!-- header-bot -->
			<div class="col-md-6 logo_agile">
				<h1><h1><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>/assets/front-end/images/logotext.png" width="400px" height="40px"> <b></b> </a>
			</div>
        <!-- header-bot -->
		
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php $sld=false; $daftar_paket=''; $keranjang=''; $pemesanan=''; $kontak=''; $paket=''; $promosi=''; $tentang=''; $pesan=''; $beranda='';
					if ($pg=='daftar_paket'){
						$daftar_paket = "--current";
					} else if ($pg=='keranjang'){
						$keranjang = "--current";
					} else if ($pg=='pemesanan'){
						$pemesanan = "--current";
					} else if ($pg=='kontak'){
						$kontak = "--current";
					} else if ($pg=='paketwo'){
						$paket = "--current";
					} else if ($pg=='input_promosi' || $pg=='data_promosi'|| $pg=='edit_promosi'|| $pg=='detail_promosi'){
						$promosi = "--current";
					} else if ($pg=='tentang'){
						$tentang = "--current";
					} else if ($pg=='pesan'){
						$pesan = "--current";
					} else {
						$beranda = "--current";
						if ($pg=="beranda"){$sld=true;}
					} 

					
				?>
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="menu__item<?php echo $beranda?>"><a class="menu__link" href="<?php echo base_url()?>">Beranda <span class="sr-only">(current)</span></a></li>

					<li class="menu__item<?php echo $daftar_paket?> dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori paket <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<?php
										foreach($this->M_data->data("tbl_kategori")->result() as $r){
									?>
									<li><a href="<?php echo base_url("paket/index/".$r->id_kategori);?>"><?php echo $r->kategori;?></a></li>
									<?php }?> 
								</ul>
					</li>

					<?php	if ($this->session->userdata(aoc_enc("Level"))=='1'){?> 
					<li class="menu__item<?php echo $keranjang?>"><a class="menu__link" href="<?php echo base_url("keranjang")?>">Keranjang Pemesanan <span class="sr-only">(current)</span></a></li>
					<?php }?>

					<?php
						if (!$this->session->has_userdata(aoc_enc('UserID'))){
					?>
					<li class="menu__item<?php echo $tentang?>"><a class="menu__link" href="<?php echo base_url("index/tentang")?>">Tentang Kami</a></li>
					<li class="menu__item<?php echo $kontak?>"><a class="menu__link" href="<?php echo base_url("index/kontak")?>">Kontak</a></li>

					<?php }else{?>
					<li class="menu__item<?php echo $pemesanan?>"><a class="menu__link" href="<?php echo base_url("pemesanan")?>">Pemesanan <span class="sr-only">(current)</span></a></li>
					<?php }if ($this->session->userdata(aoc_enc("Level"))=='2'){?>
					<li class="menu__item<?php echo $paket?> dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Paket Anda<b class="caret"></b></a>
						<ul class="dropdown-menu agile_short_dropdown"> 
							<li><a href="<?php echo base_url("paket/tambah");?>">Input Paket</a></li> 
							<li><a href="<?php echo base_url("paket/data_paket/");?>">Data Paket</a></li> 
						</ul>
					</li>
					<li class="menu__item<?php echo $pesan?>"><a class="menu__link" href="<?php echo base_url("pesan/daftar");?>">Kirim Pesan <span class="sr-only">(current)</span></a></li>
					<?php
						} else if ($this->session->userdata(aoc_enc("Level"))=='1'){
					?>
					<li class="menu__item<?php echo $pesan?> dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Pesan<b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="<?php echo base_url("pesan/");?>">Kirim Pesan</a></li>
									<li><a href="<?php echo base_url("pesan/daftar");?>">Daftar Pesan</a></li>
									 
								</ul>
					</li> 
					<?php }?>

					<?php	if ($this->session->userdata(aoc_enc("Level"))=='2'){?> 
					<li class="menu__item<?php echo $keranjang?>"><a class="menu__link" href="<?php echo base_url("admin/")?>">halaman admin <span class="sr-only">(current)</span></a></li>
					<?php }?>

				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<?php
			if (!$this->session->has_userdata(aoc_enc('UserID')) || $this->session->userdata(aoc_enc("Level"))=='1'){
		?>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1" style="background-color: black"> 
				<?php
						if (!$this->session->has_userdata(aoc_enc('UserID'))){
					?>
					<form action="#" method="post" class="last" style="background-color: yellow"> 
						<input type="hidden" name="cmd" value="_cart" style="background-color: yellow">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value="" style="background-color: yellow"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="background-color: yellow"></i></button>
					</form> 
					<?php
						} else {
					?>
					<form action="#" method="post" class="last" style="background-color: yellow"> 
						<input type="hidden" name="cmd" value="_cart" style="background-color: yellow">
						<input type="hidden" name="display" value="1">
						<a href="<?php echo base_url("keranjang")?>">
						<button class="w3view-cart" type="button" name="submit" value="" style="background-color: yellow"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="background-color: yellow"></i></button>
						</a>
					</form>  
  					<?php
  						}
  					?>
						 
			</div>
		</div>
		<?php
			}
		?>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<?php if ($sld){?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h2>Indah Collection</h2>
						<p>Wedding Organizer terbaik di daerah Sidoarjo</p>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h2><span style='color:red'></span>Indah Collection</h2>
						<p>Menyediakan paket terlengkap dan low budget</p>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h2>Indah Collection</h2>
						<p>Nikmati pelayanan berkualitas dari kami</p>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
<?php } echo $contents;?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.php"><span style="background-color: yellow;color: black">W</span>edding Organizer </a></h2>
			<p>Share On.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
					<li><a href="https://www.facebook.com/" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
						<li><a href="https://twitter.com/" class="twitter"> 
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
						<li><a href="https://instagram.com/indah_collection_wedding?igshid=YmMyMTA2M2Y=" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
						<li><a href="https://linkedin.com/" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Menu <span>Beranda</span> </h4>
					<ul>
						<li><a href="<?php echo base_url()?>">Beranda</a></li>
						<li><a href="<?php echo base_url()?>paket/index">Kategori paket </a></li>
						<li><a href="<?php echo base_url()?>index/tentang">Tentang Kami</a></li>
						<li><a href="<?php echo base_url()?>index/kontak">Kontak</a></li>
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Informasi<span> Perusahaan</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Nomor HP</h6>
								<p>0857-0864-9717</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Alamat Email</h6>
								<p>Email:<a href="https://gmail.com"> indahcollectionwedding@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Alamat</h6>
								<p>Jl. Gajah Mada Rt:004 Rw:001 Dukuhsari-Jabon-Sidoarjo</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					<h4>Metode <span>Pembayaran</span></h4>
					<table border="1" style="background-color: white;text-align: center;">
						<tr>
							<td><img src="<?php echo base_url()?>/assets/front-end/images/bca.jpg" alt=" " class="img-responsive" /></td>
							<td><img src="<?php echo base_url()?>/assets/front-end/images/bri.png" alt=" " class="img-responsive" /></td>
						</tr>
						<tr>
							<td><img src="<?php echo base_url()?>/assets/front-end/images/bni.png" alt=" " class="img-responsive" /></td>
							<td><img src="<?php echo base_url()?>/assets/front-end/images/mandiri.png" alt=" " class="img-responsive" /></td>
						</tr>
					</table> 
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<p class="copy-right">&copy 2023  <a href="#">Indah Collection Wedding</a> </p>
	</div>
</div>
<!-- //footer -->

<!-- login -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						 <form action="" method="post">
							
							<div class="styled-input agile-styled-input-top">
								<a href="<?php echo base_url("index/daftar/pelanggan")?>">
								<button type="button"  class="btn btn-primary"><i class="fa fa-user"></i> Daftar Pelanggan</button>
								</a>
							</div>
							
							
						</form>
						<div class="clearfix"></div>
						<p>Sudah memiliki akun ? <u><a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Login</a></u> </a></p> 

						</div> 
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
		
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="<?php echo base_url("index/login/")?>" method="post">
							
							<div class="styled-input">
								<input type="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 

							<div class="styled-input agile-styled-input-top">
								<input type="password" name="password" required="">
								<label>Password</label>
								<span></span>
							</div> 
							<button type="submit" class="btn btn-success">Login</button>
							<button type="reset"  class="btn btn-primary">Bersih</button>
						</form>
						  
														<div class="clearfix"></div>
														<p>Belum memiliki akun ? <u><a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Daftar</a></u> </a></p>

						</div> 
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- js -->
<script type="text/javascript" src="<?php echo base_url()?>/assets/front-end/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url()?>/assets/front-end/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/assets/front-end/js/dataTables.bootstrap.js"></script>	
 <script src="<?php echo base_url()?>/assets/front-end/css/summernote.min.js"></script>
 <script src="<?php echo base_url()?>assets/plugins/bootstrap-notify.js"></script>
  <!-- END JS PLUGIN -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        onKeyup: function(e) {
           $("#product_desc_l").html($(this).code());
        }
      });
  });$(document).ready(function(){
        var postForm = function() {
            var content = $('textarea[name="textarea_name"]').html($('#summernote').code());
        }
    });
		
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
  </script>
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable();
    });
</script>
<script src="<?php echo base_url()?>/assets/front-end/js/jquery.datetimepicker.full.js"></script>	
<script>

$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});

$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});

$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});

 $('#datetimepicker').datetimepicker({timepicker:false,
 format:'Y-m-d'});
 

</script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "inc/ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "inc/ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

</script>
<!-- //js -->
<script src="<?php echo base_url()?>/assets/front-end/js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="<?php echo base_url()?>/assets/front-end/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<script src="<?php echo base_url()?>/assets/front-end/js/imagezoom.js"></script>
	<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="<?php echo base_url()?>/assets/front-end/js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
	<script src="<?php echo base_url()?>/assets/front-end/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url()?>/assets/front-end/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<!-- FlexSlider -->
<script src="<?php echo base_url()?>/assets/front-end/js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
<script type="text/javascript" src="<?php echo base_url()?>/assets/front-end/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/assets/front-end/js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
			
	</script>
<!-- //here ends scrolling icon -->
<!-- <script type="text/javascript">
	
	var ratingInputs = document.getElementsByName('rating');
	var ratingLabels = document.querySelectorAll('.rating label i');
	console.log('ratingInputs:', ratingInputs)
	for (var i = 0; i < ratingInputs.length; i++) {
	ratingInputs[i].addEventListener('change', function() {
		console.log('ratingInputs:', ratingInputs)
	});
	} -->
</script>

<!-- for bootstrap working -->
<script type="text/javascript" src="<?php echo base_url()?>/assets/front-end/js/bootstrap.js"></script>
</body>

<!-- Mirrored from p.w3layouts.com/demos_new/template_demo/20-06-2017/elite_shoppy-demo_Free/143933984/web/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Sep 2017 07:39:49 GMT -->
</html>