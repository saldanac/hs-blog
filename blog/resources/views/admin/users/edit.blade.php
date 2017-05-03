@extends('admin.template.main')

@section('title','Editar Usuario: '.$user->name)

@section('content')
    
	{!! Form::open(['route'=>['admin.users.update',$user],'method'=>'PUT','class'=>'form-horizontal']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('username','Username',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('username',$user->username,['class'=>'form-control','placeholder'=>'Username','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombres',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('lastname','Apellidos',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('lastname',$user->lastname,['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('email','Correo Electronico',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('country_id','Pais',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('country_id',$countries,$user->country_id,['class'=>'form-control select-country','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('type','Tipo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('type',[''=>'Seleccionar tipo de Usuario','member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Usuario',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('js')

<script>

$('.select-country').chosen({
	placeholder_text_single:'Selecionar un Pais',
	no_results_text:'Ops! No se encontraron las Paises que esta buscando!'
});

</script>

@endsection


