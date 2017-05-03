@extends('admin.template.main')

@section('title')
    Listar Articulos
@endsection

@section('content')
<div class='form-group'>

<a href="{{ route('admin.articles.create') }}" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Articulo</a>

		{!! Form::open(['route'=>'admin.articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}

    		<div class='input-group'>

    			{!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Buscar Articulos']) !!}

    		<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

    	</div>

{!! Form::close() !!}
	</div>

<hr>

<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Titulo</th>
			<th>Subcategoria</th>
			<th>Usuario</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($articles as $article)
				<tr>
					<td> {{ $article->id }} </td>
					<td> {{ $article->title }} </td>
					<td> {{ $article->subcategory->name }} </td>
					<td> {{ $article->user->name }} </td>

					<td> <a href="{{ route('front.article',$article->slug) }}" class="btn btn-success"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
					@if(Auth::user()->admin())
					<a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
					<a href="{{ route('admin.articles.destroy',$article->id) }}" onclick="return confirm('Seguro que quieres eliminar este articulo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					@else
					@endif</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	<center>{!! $articles->render() !!}</center>

@endsection