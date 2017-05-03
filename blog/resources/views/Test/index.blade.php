<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="UTF-8">

		<title> {{ $article -> title }} </title>

	
	</head>

	<body>

		<h1> ESTA ES UNA PRUEBA </h1>
		<br><br>
		<hr>
		<h1> {{ $article -> title }} </h1>
		<hr>
		{{ $article -> content }}
		<hr>
		{{ $article -> user -> name }} | {{ $article -> category -> name }} 
		
		@foreach ($article -> tags as $tag)
			{{ $tag -> name }}
		@endforeach
	</body>

</html>