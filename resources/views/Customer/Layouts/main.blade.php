<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('/access/customer')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/access/customer')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('/access/customer')}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('/access/customer')}}/css/price-range.css" rel="stylesheet">
    <link href="{{asset('/access/customer')}}/css/animate.css" rel="stylesheet">
	<link href="{{asset('/access/customer')}}/css/main.css" rel="stylesheet">
	<link href="{{asset('/access/customer')}}/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('/access/customer')}}/js/html5shiv.js"></script>
    <script src="{{asset('/access/customer')}}/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	@include('Customer.Layouts.header')
	@include('Customer.Layouts.sidebar')
	@yield('contents')
	
	@include('Customer.Layouts.footer')
    <script src="{{asset('/access/customer')}}/js/jquery.js"></script>
	<script src="{{asset('/access/customer')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('/access/customer')}}/js/jquery.scrollUp.min.js"></script>
	<script src="{{asset('/access/customer')}}/js/price-range.js"></script>
    <script src="{{asset('/access/customer')}}/js/jquery.prettyPhoto.js"></script>
    <script src="{{asset('/access/customer')}}/js/main.js"></script>
</body>
</html>