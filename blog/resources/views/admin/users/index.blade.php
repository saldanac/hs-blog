@extends('admin.template.main')

@section('title')
    Lista de Usuarios
@endsection

@section('content')
<div class="group">

	<a href="{{ route('admin.users.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Usuario</a>
	<div class="btn-group">
  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Exportar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{ URL::to('admin/user/pdf')}}">PDF</a></li>
    <li><a href="{{ URL::to('admin/user/pdf')}}">Excel</a></li>
  </ul>
</div></div>


	<hr>
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Username</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Pais</th>
			<th>Tipo Usuario</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td> {{ $user->id }} </td>
					<td> {{ $user->username }} </td>
					<td> {{ $user->name }}</td>
					<td> {{ $user->lastname }} </td>
					<td> {{ $user->email }} </td>
					
					<td> @if($user->country!=null){{ $user->country->name }} @endif</td>
					
					
					<td>
						@if($user->type=='admin')
							<span class="label label-danger">Administrador</span>
						@else
							<span class="label label-success">Miembro</span>
						@endif
					 
					 </td>

					<td>
					<a href="{{ route('admin.phones.index',$user->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></a>
					<a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.users.destroy',$user->id) }}" onclick="return confirm('Seguro que quieres eliminar este usuario?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $users->render() !!}</center>

@endsection

