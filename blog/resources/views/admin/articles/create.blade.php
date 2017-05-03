@extends('admin.template.main')

@section('title')
    Crear Articulos
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.articles.store','method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('title','Titulo del Articulo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo Articulo','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('subcategory_id','Subategoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('subcategory_id',$subcategories,null,['class'=>'form-control select-subcategory','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido del Arituclo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::textarea('content',null,['class'=>'form-control textarea-content','placeholder'=>'Insertar el contenido del Articulo','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('tags','Tags',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('tags[]',$tags,null,['class'=>'form-control select-tag','multiple','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('image','Imagen',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::file('image',['class'=>'fileinput-image']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nuevo Articulo',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('js')

<script>

$('.select-tag').chosen({

	placeholder_text_multiple: 'Seleccionar Tags (Maximo: 5)',
	max_selected_options: 5,
	search_contains: true,
	no_results_text:'Ops! No se encontraron los Tags que esta buscando!'

});

$('.select-subcategory').chosen({
	placeholder_text_single:'Selecionar una Subcategoria',
	no_results_text:'Ops! No se encontraron las Subcategorias que esta buscando!'
});

$('.textarea-content').trumbowyg();

$('.fileinput-image').fileinput();

</script>

@endsection
