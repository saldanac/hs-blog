@extends('admin.template.main')

@section('title')
    @section('title','Editar Celular a: '.$user->name.' '.$user->lastname)
@endsection

@section('content')
    
	{!! Form::open(['route'=>['admin.phones.update',$user,$phone],'method'=>'PUT','class'=>'form-horizontal']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('number','Numero de Celular',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::date('number',$phone->number,['class'=>'form-control','placeholder'=>'65052117','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Numero de Celular',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection