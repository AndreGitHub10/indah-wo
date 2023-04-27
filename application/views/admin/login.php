<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/front-end/images/favicon.ico">

    <title>Wedding Organizer</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/back-end/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()?>assets/back-end/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/back-end/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/back-end/css/style-responsive.css" rel="stylesheet">
		
  </head>

  <body>
    <div id="login-page">
      <div class="container">
          
          <form class="form-login" action="login/otentikasi.php" method="POST">

            <h2 class="form-login-heading" style="color: black">LOGIN</h2>
           
            <div class="login-wrap">
                <input type="text" id="user" class="form-control" placeholder="Username" autofocus name="username">
                <br>
                <input type="password" id="pw" class="form-control" placeholder="Password" name="password">
                <br> 
                <button class="btn btn-theme btn-block" type="button" onclick="login('p')" style="color: black"><i class="fa fa-lock"></i> ENTER</button>
                <hr>
                
                <div class="login-social-link centered">
                <p>Anda bisa kembali ke halaman awal</p>
                    <a href="<?php echo base_url()?>">
                    <button class="btn btn-facebook" type="button"><i class="fa fa-home"></i> Home</button>
                    </a> 
                </div> 
    
            </div>
    
              
    
          </form>     
      
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/back-end/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/back-end/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url()?>assets/back-end/js/jquery.backstretch.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/bootstrap-notify.js"></script>
    <script>
        $.backstretch("<?php echo base_url()?>assets/back-end/img/login-bg2.jpg", {speed: 500});
    </script>
		
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

<!-- Mirrored from blacktie.co/demo/premium/dashio/dashboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 May 2016 18:27:47 GMT -->
</html>
