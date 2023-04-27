
<!DOCTYPE html>
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

	<link rel="icon" href="<?php echo base_url('assets')?>/dist/img/le.png">
</head>
<body class="hold-transition login-page">
<!-- Automatic element centering -->
<?php
	$logoprof="user.png";
?>
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>WO</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" id="user" class="form-control" placeholder="Username..">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="pw" class="form-control" placeholder="Password..">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="login('p')" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('assets')?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets')?>/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/bootstrap-notify.js"></script>

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
	
	function login(a){
		var xhr		 = GetxhrObject();
		var formData = new FormData();
		var user;
		
		if (a=='u'){formData.append("username", $("#user").val());}
		else{
			formData.append("username", $("#user").val());
			formData.append("password", $("#pw").val());
		}
		
		if (xhr) {
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (a=='u'){
						if (xhr.responseText!='N'){
							$("#fus").attr("hidden","hidden");
							$("#fpw").removeAttr("hidden");
							$("#nmakun").text(xhr.responseText);
							$("#pw").focus();
						}else{
							$.notify({
								title: "<h4>Login GAGAL.!!</h4>",
								message: "Username yang Anda Masukan tidak Dikenali.!!"
							},{
								type: "warning",
								timer: 4000,
								placement: {
									from: "top",
									align: "center"
								}
							});
						}
					}else{
						if (xhr.responseText=='Y'){
							location.href="./";
						}else{
							$.notify({
								title: "<h4>Password SALAH.!!</h4>",
								message: "Password yang Anda Masukan tidak COCOK dengan Username Anda.!!"
							},{
								type: "warning",
								timer: 4000,
								placement: {
									from: "top",
									align: "center"
								}
							});
						}
					}
				}
			}
			xhr.open("POST","<?php echo base_url().'proses/valid'?>/"+a);
			xhr.send(formData);
		}
	}

	var enus = document.getElementById("user");
	var enpw = document.getElementById("pw");
	enus.addEventListener("keyup", function(event) {
		// Cancel the default action, if needed
		event.preventDefault();
		if (event.keyCode === 13) {
			login("u");
		}
	});
	enpw.addEventListener("keyup", function(event) {
		// Cancel the default action, if needed
		event.preventDefault();
		if (event.keyCode === 13) {
			login("p");
		}
	});
	$("#user").focus();
</script>
</body>
</html>
