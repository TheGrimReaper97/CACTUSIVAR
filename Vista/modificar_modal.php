<!-- Nueva materia -->
<div class="modal fade" id="modificar_<?= $result->codigo ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Modificar Producto</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="../Modelo/modificar.php" enctype="multipart/form-data">
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
								<label class="control-label" for="uvs">descripcion:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" min="2" max="5" class="form-control" name="desu" id="desu" value="<?= $result->descripcion ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nota">imagenes:</label>
							</div>
							<div class="col-sm-10">
								<input method="POST" class="form-control" type="hidden" name="acc" id="acc" value="envio">
								<input type="file" name="archivo" class="form-control" />
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nota">categoria:</label>
							</div>
							<div class="col-sm-10">
								<select id="cat" method="POST" name="cat" class="form-control">
									<?php
									$query = $connect->prepare("SELECT * FROM categoria");
									$query->execute();
									$data = $query->fetchAll();

									foreach ($data as $valores) {
										echo '<option value="' . $valores["categoria"] . '">' . $valores["categoria"] . '</option>';
									};

									?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nota">precio:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" min="0" max="1000" step="0.1" class="form-control" name="precio" id="precio" value="<?= $result->precio ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="nota">Existencias:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" min="0" max="10000" step="0.1" class="form-control" name="exis" id="exis" value="<?= $result->existencias ?>">
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" name="add" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Modificar</a>
					</form>
			</div>

		</div>
	</div>
</div>