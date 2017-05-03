@extends('admin.template.main')

@section('title','Editar Categoria: '.$category->name)

@section('content')
    
	{!! Form::open(['route'=>['admin.categories.update',$category],'method'=>'PUT','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre Categoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripcion Categoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('description',$category->description,['class'=>'form-control','placeholder'=>'Descripcion Categoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Categoria',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

