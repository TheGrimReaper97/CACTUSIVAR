<!-- Editar materia -->
<div class="modal fade" id="editarmodal<?php echo $row->codigo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Infromacion del producto: <?=$row->nombre?></h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editar.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="codigo">Codigo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="codigo" id="codigo" value="<?=$row->codigo?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="nombre">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$row->nombre?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="uvs">Precio: </label>
					</div>
					<div class="col-sm-10">
						<input type="number" min="2" max="5" class="form-control" name="uvs" id="pecio" value="<?=$row->precio?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="nota" >Existencias:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" min="0" max="10" step="0.1" class="form-control" name="nota" id="nota" value="<?=$row->existencias?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
						<label class="control-label" for="nota" >Vista previa: <img border="2px" style="height: 100px; width: 100px; border-radius:150px; padding:  5px 5px 5px 5px;" src="img/<?=$row->img?>"></img></label>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="editar.php?cod=<?=$row->codigo?>" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Comprar</a>
			</form>
            </div>
 
        </div>
    </div>
</div>