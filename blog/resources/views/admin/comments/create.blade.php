@extends('admin.template.main')

@section('title')
    Crear Comentarios
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.comments.store','method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}

	<div class="form-group">
		{!! Form::label('comment','Comentario',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::textarea('comment',null,['class'=>'form-control textarea-comment','placeholder'=>'En que estas pensando?','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('articles','Articulos',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('articles[]',$articles,null,['class'=>'form-control select-article','multiple','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nuevo Comentario',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('js')

<script>

$('.select-article').chosen({

	placeholder_text_multiple: 'Seleccionar Articulos (Maximo: 5)',
	max_selected_options: 5,
	search_contains: true,
	no_results_text:'Ops! No se encontraron los Articulos que esta buscando!'

});

$('.textarea-comment').trumbowyg();

</script>

@endsection
