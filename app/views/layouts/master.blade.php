<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Westmoreland Builders</title>
	<meta name="description" content="Westmoreland Builders">
	<meta name="author" content="SitePoint">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="stylesheet" href="/css/w-style.css?v=1.0\\"> -->
	<link rel="stylesheet/less" type="text/css" href="/css/style.less" />
	<script src="/js/less.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  @yield('top-script')
</head>

<body>

	<header class="w-header">
		<img class="logo" src="/img/westmoreland-logo.svg" />
		<div class="w-nav text-right">
				1597 Hart Street | Southlake, TX 76092 | 817.416.4741 | <a href="#about">About Us</a>
		</div>
	</header>

	@yield('content')

	<footer class="w-footer">
		<div class="w-footer-content flex-container">
			<div class="flex-left col-2">
				<h3>Contact Westmoreland Builders</h3>
				<address>
					Dallas Office<br/>
					1597 Hart Street<br/>
					Southlake, TX 76092<br/>
					<a href="tel:817.416.4741">817.416.4741</a>
				</address>

			</div>
			<div class="flex-right col-2 flex-container w-social">
				<img src="/img/instagram.png" />
				<img src="/img/linkedin.png" />
				<img src="/img/facebook.png" />
				<img src="/img/twitter.png" />
			</div>
		</div>
		<div class="footnote">© 2017 Westmoreland Builders | All Rights Reserved.</div>
	</footer>
	@yield('bottom-script')
</body>
</html>