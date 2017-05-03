@extends('admin.template.main')

@section('title')
    Lista de Paises
@endsection

@section('content')

<a href="{{ route('admin.countries.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Pais</a>
	<hr>
    
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($countries as $country)
				<tr>
					<td> {{ $country->id }} </td>
					<td> {{ $country->name }} </td>

					<td> 
					@if(Auth::user()->admin())<a href="{{ route('admin.countries.edit',$country->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.countries.destroy',$country->id) }}" onclick="return confirm('Seguro que quieres eliminar este pais?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@else
					<a class="btn btn-danger" disabled="disabled"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Ninguna  Accion</a>
					@endif</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $countries->render() !!}</center>

@endsection