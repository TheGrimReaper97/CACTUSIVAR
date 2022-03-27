<?php
//validar los campos del formulario	
	function isNull($nombre, $user, $pass, $pass_con, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;//si ninguno es nulo
		}		
	}
	
	function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){//validar email funcion de php
			return true;
			} else {
			return false;
		}
	}
	//validar que las contraseñas sean iguales
	function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
	//limitar caracteres de los elementos 
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//validar si un usuario ya existe en la BD
	function usuarioExiste($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);//PRIMER PARÁMETRO: TIPO DE DATO ? , SEGUNDO PARAMETRO VARIABLE 
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;//USUARIO YA EXISTE
			} else {
			return false;
		}
	}
	
	function emailExiste($email)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		
		if ($num > 0){
			return true;
			} else {
			return false;	
		}
	}
	//VALIDAR TOKEN
	function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));//mt_rand -valor aleatorio obtenido de la fecha y hora del SO, uniqid - identificador único cifrado en MD5
		return $gen;
	}
	//encriptar contraseña
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	//FUNCION PARA RECIBIR ERRORES
	
	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	//FUNCION PARA REGISTRAR A LOS USUARIOS
	
	function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, nombre, correo, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssisi', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
		//ssssisi -ORDEN DEL TIPO DE DATOS INGRESADOS
		if ($stmt->execute()){
			//RETORNA ID DEL REGISTRO
			return $mysqli->insert_id;
			} else {
			return 0;	//SI HAY ERRORES AL HACER EL INGRESO

		}		
	}
	



	//validar token generado
	function validaIdToken($id, $token){
		global $mysqli;
		//verifica que la activacion sea cero
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		//cuenta activada
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
				$msg = "La cuenta ya se encuentra activa.";
				} else {
					//llamamos a activarUsuario
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
						//si no se puede actualizar la tabla
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}
	
	function activarUsuario($id)
	{
		global $mysqli;
		//actualizamos el campo de activacion a 1, para indicar que está activada
		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	//validacion de los campos del login
	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	//RECIBE EL USUARIO Y CONTRASEÑA
	function login($usuario, $password)
	{
		global $mysqli;
		//CONSULTAMOS EL USUSARIO UNGRESADO
		$stmt = $mysqli->prepare("SELECT id, id_tipo, password FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);//VALIDAMOS QUE EL USUARIO O CONTRASÑA SEA IGUAL AL PARAMETRO $USUARIO
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		//SI ENVIA RESULTADO
		if($rows > 0) {
			//LLAMAMO A isActivo, (SI EL USARIO ESTÀ ACTIVADO)
			if(isActivo($usuario)){
				
				$stmt->bind_result($id, $id_tipo, $passwd);//RECOGEMOS LOS DATOS DE LA CONSULTA
				$stmt->fetch();
				//VERIFICA LA CONSULTA INGRESADA VS LA DE LA BD
				$validaPassw = password_verify($password, $passwd);
				//SI TODO ES CORRECTO
				if($validaPassw){
					//LLAMAMOS  A LASTSESSION
					lastSession($id);
					$_SESSION['id_usuario'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					
					
					if($id_tipo==2){					
					 header("location: usuario.php");//PARA DIRECCIONAR A LA VISTA DEL USUARIO
					}else{
						header("location: admin.php");//PARA DIRECCIONAR A LA VISTA DEL ADMIN
						
					}

					} else {
					
					$errors = "Contrase&ntilde;a errónea";
				
				
				
				}
				} else {
				$errors = 'Aún no se ha activado la cuenta';
			}
			} else {
			$errors = "Nombre de usuario o correo electr&oacute;nico inexistentes";
		}
		return $errors;
	}
	//FUNCION PARA ACTUALIZAR EL CAMPO LAST SESSION
	function lastSession($id)
	{
		global $mysqli;
		//ENVIAMOS COMO UPDATE LA FECHA Y HORA DE INICIO DE SESION
		$stmt = $mysqli->prepare("UPDATE usuarios SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}
	//VERIFICA QUE EL USUARIO ESTÈ ACTIVADO 
	function isActivo($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}	
	//TOKEN DE RECUPERACION DE CONTRASEÑA Y ACTUALIZA EL TOKEN DE LA BD COMPARADO CON EL NUEVO
	function generaTokenPass($user_id)
	{
		global $mysqli;
		
		$token = generateToken();
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	//FUNCION QUE NOS DEVUELVE UNA CONSULTA
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();
		
		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	//VERIFICA QUE EL ID Y TOKEN EXISTAN Y SI EL USUARIO HA SOLICITADO CAMBIO
	function verificaTokenPass($user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	//FUNCION PARA HACER UPDATE DE LA CONTRASEÑA
	function cambiaPassword($password, $user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}		