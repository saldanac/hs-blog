@extends('admin.template.main')

@section('title')
    Lista de Tags
@endsection

@section('content')

	<div class='form-group'>

		<a href="{{ route('admin.tags.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Tag</a>
    	{!! Form::open(['route'=>'admin.tags.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}

    	<div class='input-group'>

    		{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Buscar Tags']) !!}

    		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

    	</div>

    	{!! Form::close() !!}
    </div>

    <hr>

	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($tags as $tag)
				<tr>
					<td> {{ $tag->id }} </td>
					<td> {{ $tag->name }} </td>

					<td>@if(Auth::user()->admin())<a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.tags.destroy',$tag->id) }}" onclick="return confirm('Seguro que quieres eliminar este tag?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@else
					<a class="btn btn-danger" disabled="disabled"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Ninguna  Accion</a>
					@endif</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $tags->render() !!}</center>

@endsection
