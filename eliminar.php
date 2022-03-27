<?php
$codigo=$_GET['cod'];
$productos=simplexml_load_file('productos.xml');
$indice=0;
$i=0;
foreach($productos->producto as $row){
if($row->codigo==$codigo){
    $indice=$i;
    break;
}
$i++;
}
unset($productos->producto[$indice]);
file_put_contents('productos.xml',$productos->asXML());
header('location:admin.php');
?>