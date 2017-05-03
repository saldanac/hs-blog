@extends('admin.template.main')

@section('title')
    Crear Subcategoria
@endsection

@section('content')
    
	{!! Form::open(['route'=>'admin.subcategories.store','method'=>'POST','class'=>'form-horizontal']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('name','Nombre Subcategoria',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Subcategoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripcion Subcategoria',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Descripcion Subcategoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Categoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('category_id',$categories,null,['class'=>'form-control select-category','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Nueva Subcategoria',['class'=>'btn btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('js')

<script>

$('.select-category').chosen({
	placeholder_text_single:'Selecionar una Categoria',
	no_results_text:'Ops! No se encontraron las categorias que esta buscando!'
});

</script>

@endsection