<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title></title>
        <meta name="description" content="Programming & Application Development" />
        <meta name="author" content="Irwan Susanto" />
        <link rel="shortcut icon" href="favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(images/bg.jpg);
			}
		</style>
	<!-- MODAL-->
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="css/bootstrap-modal.css" rel="stylesheet" />
  <link href="js/bootstrap-modal.js" rel="stylesheet" />
  <link href="js/bootstrap-modalmanager.js" rel="stylesheet" />
	<!-- MODAL-->
		
		<script language="javascript">
	function validasi(form){
	  if (form.username.value == ""){
		alert("Anda belum mengisikan Username.");
		form.username.focus();
		return (false);
	  }
		 
	  if (form.password.value == ""){
		alert("Anda belum mengisikan Password.");
		form.password.focus();
		return (false);
	  }
	  return (true);
	}
	</script>

	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	
	<script type="text/javascript">
	 $(document).ready(function() {
	 $("#divjam").show();
		setInterval(function() {
			$('#divjam').load('plugin/jam.php?acak='+ Math.random());
		}, 1000);
	  });
	</script>
	
	<?php include "plugin/me.php"; ?>
	
    </head>
    <body OnLoad="document.login.username.focus();">
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
               
              <a href="#">
              Irwan Susanto
                    </a>
               
                <span class="right">
                    <a href="http://www.irwansusanto.com/">
                        <strong>Proogramming & Application Development</strong>
                    </a>
					<a class="modal1" href="javascript:void(0);"><b>Developer</b></a>
                </span>
            </div><!--/ Codrops top bar -->
			
			<header>
				<br><br><br><br>
				<div class="support-note">
					<span class="note-ie">Ma'af, hanya untuk peramban terkini.</span>
				</div>
			</header>
				
			<section class="main">
				<form class="form-2" name="login" action="ceck.php" method="POST" onSubmit="return validasi(this)">
					<h1><span class="log-in">Masuk</span><span align=right class="jam" id="divjam"></span></h1>
					<p class="float">
						<label for="username"><i class="icon-user"></i>Username</label>
						<input type="text" name="username" placeholder="Username">
					</p>
					<p class="float">
						<label for="password"><i class="icon-lock"></i>Password</label>
						<input type="password" name="password" placeholder="Password" class="showpassword">
					</p>
					<p class="clearfix"> 
						   
						<input type="reset" name="submit" class="log-twitter value="reset">
						<input type="submit" name="submit" value="Log in">
					</p>
				</form>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
    </body>
</html>