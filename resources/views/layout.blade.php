<!DOCTYPE HTML>
<html>
	<head>
        <title>{{ config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="/css/main.css" />
		<link rel="stylesheet" href="/css/app.css">
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
	</head>
	<body>
		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="/">Home</a></li>
				<li><a href="/vehicles">Vehicles</a></li>
                <li><a href="/enquiries">Enquiries</a></li>
				<li><a href="/customers">Customers</a></li>
			</ul>
        </nav>

        <!-- Header -->
        <header class="alt header">
            <div class="logo"><a href="/">Stoke Motors</a></div>
            <a href="#menu">Menu</a>
        </header>

		@yield('content')

		<!-- Footer -->
		<footer id="footer">
			<div class="container">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
			</div>
			<div class="copyright">
				&copy; Untitled. All rights reserved.
			</div>
		</footer>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
