@extends('front.template.main')

@section('title',$article->title)

@section('content')<hr>
	<b><center><h3 class="title-front left">{{$article->title}}</h3></b><br>
	<i><b>Publicado por:</b> {{ $article->user->name}}  {{ $article->user->lastname}}  |   <b>Subcategoria:</b> <a href="{{ route('front.search.subcategory',$article->subcategory->name) }}">{{ $article->subcategory->name}}</a>	</i></center>
	<hr>
	<div class="row">
		<div class="col-md-9">
			@foreach($article->images as $image)
			<center>
			<a href="#"><img class="thumbnail" src="{{ asset('images/articles/'. $image->name)}}" alt="{{ $article->title }}"" width="50%" height="50%"></center></a>
			@endforeach

			<b><h1 class="title-front left">{{ $article->title}}</h1></b>
			
			{!! $article->content !!}<br><br><b>Tags:</b>

			@foreach($article->tags as $tag)
				<a href="{{ route('front.search.tag',$tag->name) }}">{{ $tag->name}}</a>
			@endforeach
			<hr>
			
			<h3>Comentarios</h3>


			@foreach($my_comments as $comment)
			
			<b>{{   $comment->user->username }}</b> - {{$comment->created_at->diffForHumans()}}
			<div class="panel panel-default">
						<div class="panel-body">
							{!! $comment->pivot->comment!!}
						</div>
					</div>
		
		@endforeach
		@if(Auth::user())

		{!! Form::open(['route'=>'admin.comments.store','method'=>'POST','files'=>'true','class'=>'form-horizontal']) !!}


		{!! Form::textarea('comment',null,['class'=>'form-control textarea-comment','placeholder'=>'Escribe un comentario...','required']) !!}

		{!! Form::select('articles[]',$articles,$article->id,['class'=>'form-control select-article','multiple','required']) !!}

		<br><br><p style="text-align: right;">{!! Form::submit('Publicar comentario',['class'=>'btn btn-success']) !!}</p>


		{!! Form::close() !!}
		@else
		<b>(*) Para publicar un comentario primero debes que iniciar sesion.</b>
		@endif 




<!--<div id="disqus_thread"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//proyecto-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>-->


                                    
		</div>
		<div class="col-md-3 aside">
			
			@include('front.aside')
			
		</div>
	</div>
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