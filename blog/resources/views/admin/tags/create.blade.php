@extends('admin.template.main')

@section('title')
    Crear Tag
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.tags.store','method'=>'POST','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre Tag',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Tag','required']) !!}
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nuevo Tag',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

