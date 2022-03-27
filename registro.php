<?php
	require 'funciones/conexion.php';
	require 'funciones/funciones.php';	
	require 'funciones/send.php';	
	
	$errors = array();//ERRORES DE CONEXION
	//VALIDANDO POST
	if(!empty($_POST)){
		//RECIBIR ELEMENTOS DEL FORMULARIO
		$nombre=$mysqli->real_escape_string($_POST['nombre']);//LIMPIAMOS LA CADENA
		$usuario=$mysqli->real_escape_string($_POST['usuario']);
		$password=$mysqli->real_escape_string($_POST['password']);
		$con_password=$mysqli->real_escape_string($_POST['con_password']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$captcha=$mysqli->real_escape_string($_POST['g-recaptcha-response']);//VALIDAR CAPTCHA
		$activo=0;//PARA HABILITAR USUARIO, 1 PARA ACTIVAR DESPUES DE MANDARLE EL CORREO, POR DEFECTO PONEMOS CERO
		$tipo_usuario=2;//ASIGNAR TIPO DE ROL
		$secret='6LcAexAfAAAAAHOy9fRu65tLvWrCTWR4-9wpgqEo';//CLAVE DE CAPTCHA
		if(!$captcha) {
			$errors[]="Verifica el captcha";
		}
		//SI EL USUARIO NO COMPLETA LOS CAMPOS -LLAMAMOS A isNULL
		if(isNull($nombre,$usuario,$password,$con_password,$email))
		{
			$errors[]="Por favor completa todos los campos";
		}
		//SI FUNCTION ISEMAIL NOS ENVÍA FALSE
		if(!isEmail($email)){
			$errors[]="El correo ingresado es inválido";
		}
		//SI validaPassword nos envía false
		if(!validaPassword($password, $con_password)){
			$errors[]="Las contraseñas no coinciden";
		}
		//LLAMAMOS A usuarioExiste-Para ver si el usuario ya existe en la BD
		if(usuarioExiste($usuario)){
			$errors[]="El nombre de usuario $usuario ya existe";
		}
		//validar correo
		if(emailExiste($email)){
			$errors[]="El correo ingresado $email ya existe";
		}
		//verificamos que no existan erroresw 
		if(count($errors)==0){
			//validando captcha en google
			$reponse=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			//verificar captcha
			//var_dump($response);
			
			//recibiendo json
			$arr=json_decode($reponse, TRUE);
			//si google lo valida
			if($arr['success']){
				//ENVIAMOS EL PARÁMETRO A LA FUNCION DE CIFRAR CONTRASEÑA
				$pass_hash=hashPassword($password);
				//generamos token único
				$token=generateToken();
				//enviamos datos a la funciond de registro
				$registro=registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);		
				
				if($registro > 0){//si devuelve id de registro
					$url='http://'.$_SERVER["SERVER_NAME"].'/Catedra_LIS/activar.php?id='.$registro.'&val='.$token;	
					//ESTRUCTURA DEL CORREO ENVIADO
					$asunto='Activar Cuenta - Cactusivar';
					$cuerpo="Estimado $nombre: <br/><br/>Para continuar el registro, es necesario hacer clic en el enlace
					<a href='$url'>Activar Cuenta</a>";
					if(enviarEmail($email,$nombre,$asunto,$cuerpo)){
						echo "Para completar el proceso de registro, verifique su correo electrónico: $email";
						
						//URL DE INICIO DE SESION
						echo "<br><a href='index.php'>Iniciar Sesión</a>";
						exit;		//detenemos script
					}else{
						$errors[]="Error en el envío del Email";
					}	

				}	
				else{
					$errors[]="Error al registrar usuario";
				}	
			}
			else{
				$errors[]='Error de validación de Captcha, intente de nuevo.';
			}
		}

	}
	
	
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro</title>
		<link rel="stylesheet" href="css/loginstyle.css" >
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<div class="container">
			<div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="panel-title">Reg&iacute;strate</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email:</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>	
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Contraseña</label>
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
							
							<div class="form-group">
								<label for="captcha" class="col-md-3 control-label"></label>
								<div class="g-recaptcha col-md-9" data-sitekey="6LcAexAfAAAAAFB8ehZWX72x8Kfc-0NQ1MFbQx7r"></div><!--COLOCAR CAPTCHA DE GOOGLE-->
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); //PARA MOSTRAR ERRORES AL USUARIO ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>															