<?php 
@session_start();


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrar</title>
        <link rel="shortcut icon" href="../images/logo.jpg">

        <!-- PNotify -->
        <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css " rel="stylesheet">
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="build/css/form-elements.css">
        <link rel="stylesheet" href="build/css/style.css">
    	<link rel="stylesheet" href="build/css/login.css">

        <script type="text/javascript">
            function error(titulo, mensaje){
                new PNotify({
                    title: titulo,
                    text: mensaje,
                    type: 'error',
                    hide: true,
                    styling: 'bootstrap3'
                });

            };

            function ingresar(){
                if(document.getElementById('username').value == "" || 
                    document.getElementById('password').value == "")
                    
                {
                    if(document.getElementById('username').value==""){
                        document.getElementById('username').style.border = "2px solid #8F141B";
                    }
                    if(document.getElementById('password').value==""){
                        document.getElementById('password').style.border = "2px solid #8F141B";
                    }                    
                    
                }else{
                    document.getElementById('username').style.border = "2px solid #ddd";
                    document.getElementById('password').style.border = "2px solid #ddd";                  

                    password = document.getElementById('password').value;
                    username = document.getElementById('username').value;
                    if(password == "1234" && username == "sara"){
                        window.location.href = "panel.php";
                    }
                    else{
                        error("Error de autenticación", "Usuario o contraseña incorrecta");
                    }            
                }       
            }        
        </script>
    </head>

    <body > 
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
					<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">
									<div class="ima_fon">
                                       
										<br>

										<div class="titulo_cabeza">ADMINISTRAR PÁGINA</div>                                        
									</div>
									<div id="cuerpo" class="cuerpo_login">
                                        <div class="form-group"></div>
										<div class="form-group">
                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="email" name="username" placeholder="E-mail" class="form-username form-control" id="username" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" class="form-password form-control" id="password" >
                                        </div>                                        
                                                                                
                                        
                                        <button type="button" id="serto" class="btn" onclick="ingresar()"><strong>INGRESAR</strong></button><br>
                                        

                                        
									</div>
                                
                                
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>

        

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/jquery/dist/jquery-2.0.0.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        
        
    </body>
</html>
<!-- PNotify -->
<script src="vendors/pnotify/dist/pnotify.js"></script>
<script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>