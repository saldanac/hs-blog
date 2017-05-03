@extends('front.template.main')

@section('title')
    Home
@endsection

@section('content')

<h3 class="title-front left">{{trans('app.ultimos_articulos')}}</h3>
	<div class="row">
		<div class="col-sm-9">
			<div class="row">

				@foreach($articles as $article)

				<div class="col-sm-6">

					<div class="panel panel-default">
						<div class="panel-head" >
						
							@foreach($article->images as $image)
								<a href="{{ route('front.article',$article->slug) }}"><img src="{{ asset('images/articles/'. $image->name)}}" alt="{{ $article->title }}" width="100%" height="500px" class="thumbnail">

							</a>

							@endforeach
							</div>
						<div class="panel-body">
							<center><b><a href="{{ route('front.article',$article->slug) }}">{{ str_limit($article->title, $limit = 45, $end = '...') }}</a></b>
							<br>
							
							<i>{{ str_limit('Publicado por '.$article->user->name.' '.$article->user->lastname, $limit = 45, $end = '...') }}</i></center>

							<hr>
							<i class="fa fa-folder-open-o"></i><a href="{{ route('front.search.subcategory',$article->subcategory->name) }}"> {{str_limit($article->subcategory->category->name.' - '.$article->subcategory->name,$limit = 30, $end = '...')}}</a>
							<div class="pull-right">
								<i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}
							</div>
						</div>
					</div>
				</div>

				@endforeach

			</div>
		</div>
		
      	




		<div class="col-sm-3 aside">
			
			@include('front.aside')
			
		</div>
	</div>
	<center>{!! $articles->render() !!}
@endsection