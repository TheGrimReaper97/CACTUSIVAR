<?php
	require '../Modelo/conexion.php';
	require '../Modelo/funciones.php';
	
	//recuperamos datos ocultos
	$user_id=$mysqli->real_escape_string($_POST['user_id']);
	$token=$mysqli->real_escape_string($_POST['token']);
	$password=$mysqli->real_escape_string($_POST['password']);
	$con_password=$mysqli->real_escape_string($_POST['con_password']);
	$url='http://'.$_SERVER["SERVER_NAME"].'/TextilExport/cambiarC.php?user_id='.$user_id.'&token='.$token;	
	//validamos contraseña
	if(validaPassword($password,$con_password)){
		$pass_hash=hashPassword($password);

		if(cambiaPassword($pass_hash,$user_id,$token))
		{
			echo "Contraseña modificada con éxito";
			echo "<br> <a href='index.php' >Iniciar Sesión</a>";
		}else{
			$errors[]="Error al camiar contraseña";
		}
	}else{
		//si las contraseñas no coinciden
		echo 'Las contraseñas no coinciden';
	}
