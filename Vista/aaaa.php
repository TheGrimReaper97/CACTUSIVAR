<?php
$sql = "SELECT * FROM Productos";
$query = $connect->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
?>
        <div class="col-md-4 mb-2" style=" border-color: #818181; border-left-width: thin;">
            <hr>
            <h4 style="text-align:center; " class="h4 mb-2"><?= $result->nombre ?></h4>
            <h5 style="text-align:center; " class="h4 mb-2"><?= $result->codigo ?></h5>
            <hr>
            <img class="img-responsive" border="2px" style="height: 300px; width: 300px; border-radius:150px; padding:  5px 5px 5px 5px;text-align:center" src="../img/<?= $result->img ?>"></img>
            <p style="text-align:center; padding:  15px 15px 15px 15px;"><?= $result->descripcion ?></p>
            <a style="text-align:center" href="verProducto.php" data-toggle="modal" class="btn btn-success">Comprar</a> <a disabled="true" class="btn btn-primary" href="#!">Precio $<?= $result->precio ?></a> <a disabled="true" class="btn btn-primary" href="#!">Existencias <?= $result->existencias ?></a>
        </div>

<?php
    }
}
?>
<?php
$sql = "SELECT * FROM Productos";
$query = $connect->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        echo "<tr>
<td>" . $result->codigo . "</td>
<td>" . $result->nombre . "</td>
<td>" . $result->descripcion . "</td>
<td>" . $result->categoria . "</td>
<td>" . $result->precio . "</td>
<td>" . $result->existencias . "</td>
<td>" . $result->img . "</td>
</tr>";
    }
}
?>
<?php
$productos = simplexml_load_file('../productos.xml');
$numerador = 0;
$denominador = 0;
foreach ($productos->producto as $row) {

?>

    <tr>
        <td style="width: 120px; padding:  10px 0px 5px 20px;" class="table-active"><?= $result->codigo ?>
            <a href="#editarmodal<?php echo $result->codigo; ?>" data-toggle="modal" class="btn btn-success">comprar/buy</a><br>
            <a class="btn btn-danger" href="#delete_<?= $result->codigo ?>" data-toggle="modal"><span class="glyphicon glyphicon-floppy-disk"></span> Eliminar..</a>
        <td style="width: 250px;text-align:center" class="table-default"><?= $result->nombre ?></td>
        <td style="text-align:center" class="table-primary"><?= $result->descripcion ?></td>
        <td style="text-align:center" class="table-secondary"><img border="2px" style="height: 150px; width: 150px; border-radius:150px; padding:  5px 5px 5px 5px;" src="../img/<?= $result->img ?>"></img></td>
        <td style="text-align:center" class="table-success"><?= $result->categoria ?></td>
        <td style="text-align:center" class="table-danger"><a>$ </a><?= $result->precio ?></td>
        <td style="text-align:center" class="table-warning"><?= $result->existencias ?></td>

    </tr>
    <?php include('nueva_modal.php'); ?>
    <?php include('borrar_modal.php'); ?>

<?php
}

?>