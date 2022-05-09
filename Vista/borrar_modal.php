<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $result->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Producto</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">Esta seguro que deseas borrar el producto?</p>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <center><label class="control-label">Codigo:</label></center>
                        <center><label name="codigo" id="codigo" class="control-label" for="codigo"><?= $result->codigo ?></label></center>
                    </div>

                </div>
                <div class="row form-group">
                    <div style="margin: 0 auto;" class="col-sm-6">
                        <center><label class="control-label" for="nota">Vista previa: </label></center>
                        <img border="2px" style="height: 200px; width: 200px; border-radius:150px; padding:  5px 5px 5px 5px;" src="../img/<?= $result->img ?>"></img>
                    </div>
                </div>
                <h2 class="text-center"><?= $result->nombre ?></h2>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="../Modelo/eliminar.php?cod=<?= $result->codigo ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Confirmar</a>
            </div>

        </div>
    </div>
</div>