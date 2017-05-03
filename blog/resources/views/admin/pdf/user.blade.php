<!DOCTYPE html>
<html lang="es">
	<head>
		<title> Reporte Usuario </title>
	</head>
	<body>
	<center><h2>Reporte Usuario</h2>
  					<h4>Fecha Impresion : {!! Carbon\Carbon::now()->toDateTimeString();!!}</h4>
  					<hr></center>
  					<table>
  						<thead>
  						<tr>
  							<th>ID</th>
  							<th>Nombre Usuario</th>
  							<th>Correo Electronico</th>
  							<th>Tipo Usuario</th>
  						</tr>				
  						</thead>
  						<tbody>
  						
  						@foreach($users as $user)
  						<tr>
  							<td>{{ $user->id }}</td>
  							<td>{{ $user->name }}</td>
  							<td>{{ $user->email }}</td>
  							<td>{{ $user->type }}</td>
  						</tr>
  						@endforeach
  						
  						</tbody>

  				</table>
  					
	</body>

</html>