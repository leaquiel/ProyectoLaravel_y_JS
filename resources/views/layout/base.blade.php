<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		{{-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> --}}
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
		{{-- <link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/styles.css"> --}}
		<link href="https://unpkg.com/ionicons@4.4.2/dist/css/ionicons.min.css" rel="stylesheet">
		<script src="{{ asset('js/app.js') }}" defer></script>
		{{-- <script href="@yield('script')"></script> --}}

	</head>
	<body id="mainBody">
		@include('layout.header')

			@yield('main_content')

    @include('layout.footer')
	</body>
</html>
<script>

window.addEventListener("load", function () {


		if (localStorage.getItem("bodyImage") != null) {
			let img = localStorage.getItem('bodyImage');
			document.body.style.backgroundImage = `${img}`;
			console.log(localStorage.getItem('bodyImage'));
		}
		else {
			localStorage.setItem("bodyImage", "url('/images/fondo.jpg')");
			console.log(localStorage.getItem('bodyImage'));
		}

});

</script>
