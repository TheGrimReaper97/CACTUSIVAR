<!-- Editar materia -->
<div class="modal fade" id="editarmodal_<?= $result->codigo ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Informacion del producto: <?= $result->nombre ?></h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="editar.php">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="codigo">Codigo:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="codigo" id="codigo" value="<?= $result->codigo ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nombre">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $result->nombre ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="uvs">Precio: </label>
							</div>
							<div class="col-sm-10">
								<input type="number" min="2" max="5" class="form-control" name="uvs" id="pecio" value="<?= $result->precio ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nota">Existencias:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" min="0" max="10" step="0.1" class="form-control" name="nota" id="nota" value="<?= $result->existencias ?>">
							</div>
						</div>
						<div class="row form-group">
							<div style="margin: 0 auto;" class="col-sm-6">
								<label class="control-label" for="nota">Vista previa: </label>
								<img border="2px" style="height: 200px; width: 200px; border-radius:150px; padding:  5px 5px 5px 5px;" src="../img/<?= $result->img ?>"></img>
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<a href="?cod=<?= $result->codigo ?>" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Comprar</a>
				</form>
			</div>

		</div>
	</div>
</div>