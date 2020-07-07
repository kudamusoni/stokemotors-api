<!DOCTYPE HTML>
<html>
	<head>
        <title><?php echo e(config('app.name')); ?></title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="css/app.css">
	</head>
	<body>

		<!-- Nav -->
			<nav id="menu"></nav>
				<ul class="links">
					<li><a href="/">Home</a></li>
					<li><a href="/vehicles">Vehicles</a></li>
                    <li><a href="/enquiries">Enquiries</a></li>
					<li><a href="/customers">Customers</a></li>
				</ul>
			</nav>

		<?php echo $__env->yieldContent('content'); ?>


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
<?php /**PATH C:\Users\Kuda Musoni\Documents\Code\stokemotors-api\resources\views/layouts/layout.blade.php ENDPATH**/ ?>