<?php
$productos=simplexml_load_file('productos.xml');
$producto=$productos->addChild('producto');
$producto->addChild('codigo',$_POST['codigo']);
$producto->addChild('nombre',$_POST['nombre']);
$producto->addChild('descripcion',$_POST['desu']);
 $producto->addChild('img',$_FILES['archivo']['name']);
$producto->addChild('categoria',$_POST['categoria']);
$producto->addChild('precio',$_POST['precio']);
$producto->addChild('existencias',$_POST['exis']);

file_put_contents('productos.xml',$productos->asXML());
header('location:admin.php?exito=1');

if($_POST['acc']=='envio'){
   $nar=$_FILES['archivo']['name'];
    move_uploaded_file($_FILES['archivo']['tmp_name'],'img/'.$nar);
}
?>
