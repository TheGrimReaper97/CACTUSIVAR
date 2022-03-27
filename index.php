<?php
	session_start();
	require 'funciones/conexion.php';
	require 'funciones/funciones.php';
	$errors=array();
	if(!empty($_POST)){
		$usuario=$mysqli->real_escape_string($_POST['usuario']);
		$password=$mysqli->real_escape_string($_POST['password']);
		if(isNullLogin($usuario, $password)){
			$errors[]="Debes completar todos los campos";
		}
		//llamamos a la funcion login
		$errors[]=login($usuario,$password); 
	}
	
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		
		<link rel="stylesheet" href="css/loginstyle.css" >
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<!--CREATIVE COMMONS 1.O UNIVERSAL-->
		<a rel="license" href="http://creativecommons.org/publicdomain/mark/1.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/p/mark/1.0/88x31.png" /></a><br /></a>.
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-success" >
					<div class="panel-heading">
						<div class="panel-title">Iniciar Sesi&oacute;n</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px;"><a href="recuperarC.php">¿Se te olvid&oacute; tu contraseña?</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Email o usuario" required>                                        
							</div>
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
							</div>
							
							<div style="margin-top:10px" class="form-group" >
								<div class="col-sm-12 controls"> 
									<button id="btn-login" type="submit" class="btn btn-info">Iniciar Sesi&oacute;n</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Aún no tienes cuenta? <a href="registro.php">Registrate</a>
									</div>
								</div>
							</div>    
						</form>
						<?php echo resultBlock($errors);//para mostrar los errores?>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>						