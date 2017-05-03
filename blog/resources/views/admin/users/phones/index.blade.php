@extends('admin.template.main')

@section('title')
    @section('title','Contactar a: '.$user->name.' '.$user->lastname)
@endsection

@section('content')
<div class="group">
	<a href="{{ route('admin.phones.create',$user->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Asignar Numero de Celular</a>
	<div class="btn-group">
</div>
	<hr>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Celular</th>
			<th>Accion</th>
		</thead>
		<tbody>


		@foreach($user->phones as $phone_user)
				<tr>
					<td> {{ $phone_user->id }} </td>
					<td> {{ $phone_user->number }} </td>
					 <td> 
					 	<a href="{{ route('admin.phones.edit',['user'=>$user->id,'phone_user'=>$phone_user->id]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

						<a href="{{ route('admin.phones.destroy',['user'=>$user->id,'phone_user'=>$phone_user->id]) }}" onclick="return confirm('Seguro que quieres eliminar esta numero de celular de este usuario?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>
	</div>
	<hr>

@endsection