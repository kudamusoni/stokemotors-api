<!DOCTYPE HTML>
<html>
	<head>
        <title><?php echo e(config('app.name')); ?></title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php echo e(HTML::style('assets/css/main.css')); ?>

        
        <link rel="stylesheet" href="/css/app.css">
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
            <div class="logo">Stoke Motors</div>
            <a href="#menu">Menu</a>
        </header>

        <div>
            <div class="box" style="height: 100%">
                <div class="image fit">
                    <img src="<?php echo e($vehicle['main_image']['url']); ?>" alt="" />
                </div>
                <div class="content">
                    <header class="align-center">
                        <p>mattis elementum sapien pretium tellus</p>
                        <h2 style="height: 70px"><?php echo e($vehicle['make']['name'] . " " .
                            $vehicle['model']['name'] . " " .
                            $vehicle['edition']['name']); ?></h2>
                    </header>
                    <p style="overflow: hidden; height:85px">
                        Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis.
                        Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum.
                        Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.
                    </p>
                    <footer class="align-center">
                        <a href="/vehicles/info/<?php echo e($vehicle['id']); ?>" class="button alt">Learn More</a>
                    </footer>
                </div>
            </div>
        </div>
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

<?php /**PATH C:\Users\Kuda Musoni\Documents\Code\stokemotors-api\resources\views/detail.blade.php ENDPATH**/ ?>