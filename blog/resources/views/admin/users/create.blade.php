@extends('admin.template.main')

@section('title')
    Crear Usuario
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.users.store','method'=>'POST','class'=>'form-horizontal']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('username','Username',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Username','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombres',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('lastname','Apellidos',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('email','Correo Electronico',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required']) !!}
		</div>
	</div>

	<div class="form-group">

		{!! Form::label('password','Contraseña',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('country_id','Pais',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('country_id',$countries,null,['class'=>'form-control select-country','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('type','Tipo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control','required','placeholder'=>'Seleccionar una opcion..']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nuevo Usuario',['class'=>'btn btn-success']) !!}
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
