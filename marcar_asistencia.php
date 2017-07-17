<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro de Asistencia</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>  
    <div class="container">
			<div class="row-fluid">				
				<div class="col-md-12">
					<h2><span class="glyphicon glyphicon-edit"></span> Marcar Asistencia</h2>
					<hr>

					<form class="form-horizontal" role="form" id="datos_pedido" action="registro_as.php" method = "POST">
						<div class="row">					
							<div class="col-md-3">
								<label for="transporte" class="control-label">Número de Tarjeta</label>
								<input type="text" class="form-control input-sm" name="tarjeta" maxlength="3" id="transporte"  required placeholder="Tarjeta">
							</div>						
							<div class="col-md-3">
								<label for="proveedor" class="control-label">Selecciona Turno</label>						
								<select class="proveedor form-control" name="turno" id="proveedor" required>
									<option  value="1">Desayuno</option>
									<option  value="2">Almuerzo</option>
									<option  value="3">Cena</option>
								</select>
							</div>								
						</div>		
						<hr>
						<div class="col-md-12">
							<div class="pull-right">
								<input type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal" value="Marcar Asistencia">
								<span class="glyphicon glyphicon-plus"></span>
								</input>				
							</div>	
						</div>
					</form>

				</div>	
			</div>
		</div>
	</body>
</html>