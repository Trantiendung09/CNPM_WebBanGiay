<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | Táo Store</title>
	<link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		@include('layout/header')
	</header>
	<!--/header-->
	{{-- section top --}}


	<section>
		<div class="container">
			@yield('content')
		</div>
	</section>
	<footer id="footer">
		<!--Footer-->
		@include('layout/footer')
	</footer>
	<!--/Footer-->

	<script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/fontend/js/main.js')}}"></script>
	<!-- <script>
    function addTocart(event) {
        event.preventDefault();
        var url=$('.add-to-cart').data('url');
        alert(url);
    }
    $(function () {
        $('.add-to-cart').on('click', addTocart);
    })
</script> -->
</body>
</html>