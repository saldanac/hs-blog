@extends('admin.template.main')

@section('title','Editar Tag: '.$tag->name)

@section('content')
    
	{!! Form::open(['route'=>['admin.tags.update',$tag],'method'=>'PUT','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre Tag','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Categoria',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

