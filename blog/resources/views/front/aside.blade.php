@foreach($categories as $category)
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title"><!--{{trans('app.subcategorias')}}-->{{str_limit($category->name, $limit = 30, $end = '...')}}</h3>
	</div>

	
	<div class="list-group">
	@foreach($category->subcategories as $subcategory)
	
	<div class="panel-body">
	
		
				<a class="list-group-item" href="{{ route('front.search.subcategory',$subcategory->name) }}">
					{{ str_limit($subcategory->name, $limit = 20, $end = '...')}}<span class="badge">{{ $subcategory->articles->count() }}</span>
				</a>			
	</div>
	@endforeach
	
	</div>
	

</div>
@endforeach


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tags</h3>
	</div>
	<div class="panel-body">
		@foreach($tags as $tag)
				<span class="label"><a href="{{ route('front.search.tag',$tag->name) }}">{{ $tag->name}}</a></span>
		@endforeach
	</div>
</div>