<?php
//inciamos la sesion
session_start();
//destruimos sesiòn
session_destroy();
//redireccionamos a index.php
header('location: index.php');
	
?>