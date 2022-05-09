<?php include('../Modelo/BDconect.php');?>
<?php

////// Informacion enviada por el formulario /////
$codigo=$_POST['codigo'];
$nombre=$_POST['nombre'];
$desu=$_POST['desu'];
$img=$_FILES['archivo']['name'];
$cat=$_POST['cat'];
$precio=$_POST['precio'];
$exis=$_POST['exis'];
////// Fin informacion enviada por el formulario ///

////////////// Actualizar la tabla /////////
$consulta = "UPDATE Productos
SET codigo= :codigo, nombre= :nombre, descripcion = :desu, img = :name, categoria = :cat, precio = :precio, existencias = :exis
WHERE codigo = :codigo";
$query = $connect->prepare($consulta);
$query->bindParam(':codigo',$codigo,PDO::PARAM_STR, 9);
$query->bindParam(':nombre',$nombre,PDO::PARAM_STR, 150);
$query->bindParam(':desu',$desu,PDO::PARAM_STR, 500);
$query->bindParam(':cat',$cat,PDO::PARAM_STR,50);
$query->bindParam(':precio',$precio,PDO::PARAM_INT);
$query->bindParam(':exis',$exis,PDO::PARAM_INT);
$query->bindParam(':name',$img,PDO::PARAM_STR,150);
$query->execute();
if($_POST['acc']=='envio'){
    $nar=$_FILES['archivo']['name'];
     move_uploaded_file($_FILES['archivo']['tmp_name'],'../img/'.$nar);
 }
 header('location:../vista/admin.php');
?>