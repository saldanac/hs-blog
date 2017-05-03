<!DOCTYPE html>

<html lang="es">

	<head>

		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> @yield('title','Default') | Proyecto </title>

		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

		<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

		<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/fileinput_bootstrap/css/fileinput.css') }}">

	</head>

	<body>
	@include('admin.template.partials.nav')
	@include('front.template.partials.header')
	<br>
		<div class="container">

		@include('flash::message')

  		@include('admin.template.partials.errores')

			<section>

				<!--<div class="panel panel-default">

  					<div class="panel-heading"><h4>@yield('title','Default')</h4></div>

  						<div class="panel-body">-->

							<p>@yield('content')</p>

  						<!--</div>
				</div>-->

			</section>

			@include('front.template.partials.foot')

		</div>

	<script src="{{ asset('plugins/jquery/js/jquery-3.1.0.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
	<script src="{{ asset('plugins/fileinput_bootstrap/js/fileinput.js') }}"></script>

	@yield('js')
	

	<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
	
	</body>

</html>