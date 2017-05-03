@extends('admin.template.main')

@section('title','Editar Pais: '.$country->name)

@section('content')
    
	{!! Form::open(['route'=>['admin.countries.update',$country],'method'=>'PUT','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre Pais',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',$country->name,['class'=>'form-control','placeholder'=>'Nombre Pais','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Pais',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection