<?php
	
	require 'funciones/conexion.php';
	require 'funciones/funciones.php';	
	require 'funciones/send.php';	
	$user_id = null;
	$token = null;
	//recibimos las variables user y token
	//si no las recibimos mandamos al index
    if(empty($_GET['user_id'])){
		header('Location: index.php');
	}
	
    if(empty($_GET['token'])){
		header('Location: index.php');
	}
	$user_id=$mysqli->real_escape_string($_GET['user_id']);
	$token=$mysqli->real_escape_string($_GET['token']);
	if(!verificaTokenPass($user_id,$token)){ 
		echo 'No se puede verificar los Datos';
		exit;
	}
	
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cambiar Contraseña</title>
		
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
						<div class="panel-title">Modificar contraseña</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<form id="loginform" class="form-horizontal" role="form" action="guardarC.php" method="POST" autocomplete="off">
							
							<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; //ENVIAMOS DATOS DE MANERA OCULTA?>" />
							
							<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Contraseña nueva:</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Contraseña" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar contraseña" required>
								</div>
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
								</div>
							</div>   
						</form>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>	