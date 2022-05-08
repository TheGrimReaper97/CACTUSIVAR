
<?php
//inciamos la sesion
session_start();
//destruimos sesiòn
session_destroy();
//Reset OAuth access token
include('config.php');
$google_client->revokeToken();
//redireccionamos a index.php
header('location: index.php');
?>
