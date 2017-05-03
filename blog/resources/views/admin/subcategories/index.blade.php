@extends('admin.template.main')

@section('title')
    Lista de Subcategorias
@endsection

@section('content')
<div class="group">

	<a href="{{ route('admin.subcategories.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Subcategoria</a>
	<div class="btn-group">
</div></div>


	<hr>
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre Subcategoria</th>
			<th>Descripcion Subcategoria</th>
			<th>Categoria</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($subcategories as $subcategory)
				<tr>
					<td> {{ $subcategory->id }} </td>
					<td> {{ $subcategory->name }} </td>
					<td> {{ $subcategory->description }} </td>
					<td> {{ $subcategory->category->name }} </td>

					<td> <a href="{{ route('admin.subcategories.edit',$subcategory->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.subcategories.destroy',$subcategory->id) }}" onclick="return confirm('Seguro que quieres eliminar esta subcategoria?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $subcategories->render() !!}</center>

@endsection

