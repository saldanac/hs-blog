@extends('admin.template.main')

@section('title')
    Crear Pais
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.countries.store','method'=>'POST','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre Pais',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Pais','required']) !!}
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nuevo Pais',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

