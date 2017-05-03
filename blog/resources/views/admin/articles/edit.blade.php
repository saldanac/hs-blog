@extends('admin.template.main')

@section('title','Editar Articulos: '.$article->title)

@section('content')
    
	{!! Form::open(['route'=>['admin.articles.update',$article],'method'=>'PUT','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('title','Titulo del Articulo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo Articulo','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('subcategory_id','Subcategoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('subcategory_id',$subcategories,$article->subcategory->id,['class'=>'form-control select-subcategory','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido del Arituclo',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::textarea('content',$article->content,['class'=>'form-control textarea-content','placeholder'=>'Insertar el contenido del Articulo','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('tags','Tags',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('tags[]',$tags,$my_tags,['class'=>'form-control select-tag','multiple','required']) !!}
		</div>
	</div>

	<!--<div class="form-group">
		{!! Form::label('image','Imagen',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::file('image',['class'=>'fileinput-image']) !!}
		</div>
	</div>-->

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Articulo',['class'=>'btn btn-success']) !!}
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

$('.select-category').chosen({
	placeholder_text_single:'Selecionar una Subcategoria',
	no_results_text:'Ops! No se encontraron las Subcategorias que esta buscando!'
});

$('.textarea-content').trumbowyg();

$('.fileinput-image').fileinput();

</script>

@endsection
