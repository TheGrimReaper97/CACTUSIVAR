<?php
require 'funciones/conexion.php';
require 'funciones/funciones.php';	
require 'funciones/send.php';	
$errors=array();
if(!empty($_POST)){
	$email=$mysqli->real_escape_string($_POST['email']);
	if(!isEmail($email)){
		$errors[]="Debe ingresar un correo válido";
	}
		if(emailExiste($email)){
			$user_id=getValor('id','correo',$email);
			$nombre=getValor('nombre','correo',$email);
			//generamos token
			$token=generaTokenPass($user_id);
			$url='http://'.$_SERVER["SERVER_NAME"].'/Catedra_LIS/cambiarC.php?user_id='.$user_id.'&token='.$token;	
			$asunto='Recuperar Contrasena - Cactusivar';
			$cuerpo="Estimado $nombre: <br/><br/>Para cambiar tu contrase&ntilde;a haz clic 
			en el enlace: <a href='$url'>$url</a>";///recibimos la url
			if(enviarEmail($email,$nombre,$asunto,$cuerpo)){
				echo "Para completar el proceso, verifique su correo electrónico: $email  ";
				echo "<a href='index.php'>Iniciar Sesión</a>";
				exit;
			}
			else{
				$errors[]="Error al cambiar contrase&ntilde;a";
			}
		}else{
			$errors[]="El email ingresado no existe";
		}
	
}


	
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Recuperar Contraseña</title>
		
		<link rel="stylesheet" href="css/loginstyle.css" >
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-success" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar contraseña</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="Email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Aún no tienes cuenta? <a href="registro.php">Registrate</a>
									</div>
								</div>
							</div>    
						</form><?php echo resultBlock($errors);//mostrar errores?>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							