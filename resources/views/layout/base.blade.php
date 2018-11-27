<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <style src=@yield('script')></style>
	</head>
	<body>
		@include('layout.header')

		<div class="container">
			@yield('main_content')
		</div>

    @include('layout.footer')
	</body>
</html>
