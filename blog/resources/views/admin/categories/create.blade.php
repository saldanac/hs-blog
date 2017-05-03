@extends('admin.template.main')

@section('title')
    Crear Categoria
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.categories.store','method'=>'POST','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre Categoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Categoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripcion Categoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Descripcion Categoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nueva Categoria',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

