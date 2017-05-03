@extends('admin.template.main')

@section('title')
    Lista de Categorias
@endsection

@section('content')

<a href="{{ route('admin.categories.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Categoria</a>
	<hr>
    
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td> {{ $category->id }} </td>
					<td> {{ $category->name }} </td>
					<td> {{ $category->description }} </td>

					<td> 
					@if(Auth::user()->admin())<a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.categories.destroy',$category->id) }}" onclick="return confirm('Seguro que quieres eliminar esta categoria?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@else
					<a class="btn btn-danger" disabled="disabled"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Ninguna  Accion</a>
					@endif</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $categories->render() !!}</center>

@endsection