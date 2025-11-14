<?php 
@session_start();
$_SESSION = array();


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
        <title>Sistema Matrículas</title>
        <link rel="shortcut icon" href="../images/logo.jpg">

        <!-- PNotify -->
        <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="build/css/form-elements.css">
        <link rel="stylesheet" href="build/css/style.css">
    	<link rel="stylesheet" href="build/css/login.css">

        <script src="js/libs/angular/angular.min.js"></script>

    </head>

    <body ng-app="sistemaMatriculas" ng-controller="indexController"> 
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

										<div class="titulo_cabeza">Sistema Matrículas</div>                                        
									</div>
									<div id="cuerpo" class="cuerpo_login">
                                        <div class="form-group"></div>
										<div class="form-group">
                                            <label class="sr-only" for="form-username">Correo</label>
                                            <input type="text" placeholder="Correo" class="form-username form-control" ng-model="usuario" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Contraseña" class="form-password form-control" ng-model="password" >
                                        </div>                                        
                                                                                
                                        
                                        <button type="button" id="serto" class="btn" ng-click="validarDatosLogin()"><strong>INGRESAR</strong></button><br>
                                        

                                        
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
        <script src="index_component.js"></script>

        
        
    </body>
</html>
<!-- PNotify -->
<script src="vendors/pnotify/dist/pnotify.js"></script>
<script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>