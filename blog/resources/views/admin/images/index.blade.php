@extends('admin.template.main')

@section('title')
    Ver Articulos
@endsection

@section('content')

		<div class="row">
		<div class="col-sm-9">
			<div class="row">

				@foreach($images as $image)

				<div class="col-sm-6">

					<div class="panel panel-default">
						<div class="panel-head" >
						
								<a href="{{ route('front.article',$image->article->slug) }}"><img src="../images/articles/{{ $image->name}}" alt="" width="100%" height="400px" class="thumbnail">

							</a>

							</div>
						<div class="panel-body">
							<b><a href="{{ route('front.article',$image->article->slug) }}"></a></b>
							
							<center><i>{{$image->article->title}}</i></center>

							<hr>
							<i class="fa fa-folder-open-o"></i> {{ str_limit('Publicado por '.$image->article->user->name.' '.$image->article->user->lastname, $limit = 45, $end = '...') }}<br>
							{{ str_limit('Username '.$image->article->user->username, $limit = 45, $end = '...') }}<br>
							{{ str_limit('Fecha '.$image->article->created_at, $limit = 45, $end = '...') }}
							<div class="pull-right">
								<i class="fa fa-clock-o"></i>
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
@endsection
