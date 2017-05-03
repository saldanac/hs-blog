@extends('admin.template.main')

@section('title','Editar Categoria: '.$subcategory->name)

@section('content')
    
	{!! Form::open(['route'=>['admin.subcategories.update',$subcategory],'method'=>'PUT','class'=>'form-horizontal']) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('name','Nombre Subcategoria',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('name',$subcategory->name,['class'=>'form-control','placeholder'=>'Nombre Subcategoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('description','Descripcion Subcategoria',['class'=>'col-md-4 control-label']) !!}
		 <div class="col-md-6">
			{!! Form::text('description',$subcategory->description,['class'=>'form-control','placeholder'=>'Descripcion Subcategoria','required']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Categoria',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('category_id',$categories,$subcategory->category_id,['class'=>'form-control select-category','required']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			{!! Form::submit('Editar Subcategoria',['class'=>'btn btn-success']) !!}
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