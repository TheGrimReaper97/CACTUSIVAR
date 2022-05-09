<?php include('../Modelo/BDconect.php');?>
<?php
////////////// Elimianr registro de la tabla /////////
$query = "DELETE FROM Productos WHERE codigo=:cod";
$stmt = $connect-> prepare($query);
$codigo=trim($_GET['cod']);
$stmt -> bindParam(':cod', $codigo, PDO::PARAM_STR);
$stmt->execute();
header('location:../vista/admin.php');
echo "$codigo"
?>