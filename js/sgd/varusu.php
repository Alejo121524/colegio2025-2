<?

session_start();





/*echo"<script>$('#div_mensaje1').html('');</script>";*/

$accion=$_REQUEST['accion'];

$usu=$_REQUEST['usu'];

$key=$_REQUEST['contra'];

$uapSelect=$_REQUEST['uapSelect'];

$version=$_REQUEST['version'];



include("clases/cls_login.php");

$clase = new cls_login();



	//se destruye la sesion

	if($accion==0){

		session_destroy();

	}



	//se consulta su tiene mas de un perfil

	if($accion==1){

		$respuesta = $clase->consultPerfiles($usu,$key);

		if(count($respuesta)>0){

			if(count($respuesta)>1){

				$_SESSION['perfiles']=array();

				$_SESSION['perfiles']=$respuesta;

				?>

					<script>

						cargar_perfiles();

					</script>

				<?

			}else{

				?>

					<script>

						login(0);

					</script>

				<?

			}

		}else{

			?>

				<script>

						validar(1);

				</script>

			<?

		}

	}



	//si tiene mas de un perfil se muesran

	if($accion==2){

		echo "<div>";

		echo "<div class='list-group'>";

		foreach ($_SESSION['perfiles'] as $actual){

		    echo"<a class='list-group-item' id='lista' onclick=\" login('".$actual[usg_grupo]."')  \">$actual[gru_nombre]</a>";

		}

		echo"</div>";

		echo"</div>";

	}



	//se consultan algunos parametros

	if($accion==3){

		$respuesta = $clase->consultLogin($usu,$key,$uapSelect);

		if(count($respuesta)>0){

			foreach ($respuesta as $actual){

				$_SESSION['iduapcod']=$actual['up'];

				$_SESSION['uid']=$actual['uid'];

				$_SESSION['valor']=$actual['direc_archivos'];

				$_SESSION['ruta']=$actual['ruta'];

				$_SESSION['nomUsuLogueado']=$actual['per_nombre']; 

				$_SESSION['uaaCod']=$actual['uaa_codigo']; 

				$_SESSION['nomPerfilGroup']=$actual['gru_nombre']; 

				$_SESSION['varVersion']=$version;  

			}



			?>

				<script>

						personal();

				</script>

			<?

		}else{

			?>

				<script>

						validar(1);

				</script>

			<?

		}



	}



	//se consulta si tiene vinculacion

	if($accion==4){

		$respuesta = $clase->consultPersonal($_SESSION['iduapcod']);

		if(count($respuesta)>0){

			foreach ($respuesta as $actual){

				$_SESSION['person']=$actual['pea_codigo'];

				$_SESSION['uaaCod']=$actual['uaa_codigo']; 

				$_SESSION['uaaNombre']=$actual['uaa_nombre_corto']; 

				$_SESSION['cargo']=$actual['car_nombre']; 

			}

			//echo $_SESSION['nomUsuLogueado'];

			?>

				<script>

					window.open("panel.html","_top");

				</script>

			<?

		}else{

			?>

				<script>

						validar(2);

				</script>

			<?

		}



	}



?>