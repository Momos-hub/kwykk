 session_start();

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KWYK | Store Front</title>

	<link rel="shortcut icon" href="White_on_Blue.png" type="image/x-icon">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- For Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<!-- Font Awesome -->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Owl Carousel -->
	<link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">

	<!-- Fancy Box -->
	<link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<!-- CUSTOM CSS -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">

	<header>

		<a href="index.html" class="logo" style="color: white;"><span>K</span>WYK</a>

		<nav class="navbar">
			<a href="index.php">home</a>
			<a href="#about">About Us</a>
			<a href="#menu">Menu</a>
			<a href="terms-condition.php#contact">contact</a>
		</nav>

		<div class="icons">
			<i class="fas fa-search" id="search-btn"></i>
			<a href="#"><i class="fas fa-shopping-cart" id="cart"></i></a>
			<a href="http://localhost/kwyk/Login/signin/signin.php"><i class="fas fa-user" id="login-btn"></i></a>
		</div>

		<form action="" class="search-bar-container">
			<input type="search" id="search-bar" placeholder="search here...">
			<label for="search-bar" class="fas fa-search"></label>
		</form>

	</header><br><br>

	<!--===============================
=            Hero Area            =
================================-->

	<section class="hero-area bg-1 text-center overly">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block">
						<h1>KWYK RESTAURANT </h1>
						<p>Kwyk Foods is an Indian, Mughlai & Chinese Restaurant<br> It serves Authentic Mughlai Foods
							like Chicken Lababdar,<br>
							Chicken Rara, Tandoori Chicken Etc From Last 18 Years.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>

	<!-- Menu Section-->
	<section class="menu" id="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card mt-3">
						<div class="card-header">
							  <h1 style="text-align: center;">MENU</h1>
						</div>
					</div>
				</div>

				<!-- Brand List  -->
				<div class="col-md-3">
					<form action="" method="GET">
						<div class="card shadow mt-3">
							<div class="card-header">
								<h5 style="font-size:20px">Filter
									<button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
								</h5>
							</div>
							<div class="card-body">
								<h4>Brand List</h4>
								<hr>

								<?php
								session_start();
								
								$con = mysqli_connect("localhost", "root", "", "filter");

								$brand_query = "SELECT * FROM brands";
								$brand_query_run  = mysqli_query($con, $brand_query);

								if (mysqli_num_rows($brand_query_run) > 0) {
									foreach ($brand_query_run as $brandlist) {
										$checked = [];
										if (isset($_GET['brands'])) {
											$checked = $_GET['brands'];
										}
								?>
								<div>
									<input type="checkbox" name="brands[]" value="<?= $brandlist['id']; ?>" <?php if
										(in_array($brandlist['id'], $checked)) { echo "checked" ; } ?> />
									<?= $brandlist['name']; ?>
								</div>
								<?php
									}
								} else {
									echo "No Brands Found";
								}
								?>
							</div>
						</div>
					</form>
				</div>

				<!-- Brand Items - Products -->
				<div class="col-md-9 mt-3">
					<div class="card ">
						<div class="card-body row">
							<?php
							if (isset($_GET['brands'])) {
								$branchecked = [];
								$branchecked = $_GET['brands'];
								foreach ($branchecked as $rowbrand) {
									// echo $rowbrand;
									$products = "SELECT * FROM products WHERE brand_id IN ($rowbrand)";
									$products_run = mysqli_query($con, $products);
									if (mysqli_num_rows($products_run) > 0) {
										foreach ($products_run as $proditems) :
							?>
							<div class="col-md-4 mt-3">
								<div class="border p-2">
									<div class="prod-img">
										<?php echo '<img src="data:image;base64,' . base64_encode($proditems['image']) . ' " 
                                                        alt="image" style="width: 250px; height: 150px;border-radius: 10px;">'; ?>
									</div>
									<h2 style="text-align: center;">
										<?= $proditems['name']; ?><br>
										&#8377;
										<?= $proditems['price']; ?><br>
										<a href="product.php" class="btn btn-primary btn-sm">Add to Cart</a>
									</h2>

								</div>
							</div>
							<?php
										endforeach;
									}
								}
							} else {
								$products = "SELECT * FROM products";
								$products_run = mysqli_query($con, $products);
								if (
									mysqli_num_rows($products_run)
									> 0
								) {
									foreach ($products_run as $proditems) :
										?>
							<div class="col-md-4 mt-3">
								<div class="border p-2">
									<div class="prod-img">
										<?php echo '<img src="data:image;base64,' . base64_encode($proditems['image']) . ' " 
													alt="image" style="width: 250px; height: 150px; border-radius: 10px;">'; ?>
									</div>
									<hr>
									<h2 style="text-align: center;">
										<?= $proditems['name']; ?><br>
										&#8377;
										<?= $proditems['price']; ?><br>
										<a href="product.php" class="btn btn-primary btn-sm">Add to Cart</a>
									</h2>
								</div>
							</div>
							<?php
									endforeach;
								} else {
									echo "No Items Found";
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--============================
=            Footer            =
=============================-->

	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="img/logo-footer.png" height="100px" alt="">
						<!-- description -->
						<p class="alt-color">Kwyk is a on demand hyperlocal delivery service company
							that connects customers, merchants and delivery partners to facilitate
							hassle-free transactions</p>

					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3">
					<div class="block">
						<h4>Company</h4>
						<ul>
							<li><a href="about-us.html">About Us</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="terms-condition.html">Privacy Policy</a></li>
							<li><a href="terms-condition.html">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
					<div class="block">
						<h4>Get Help</h4>
						<ul>
							<li><a href="#">FAQ</a></li>
							<li><a href="#contact">Contact Us</a></li>
							<li><a href="#">Feedback</a></li>
							<li><a href="blog.html">Blog</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-md-7">
					<div class="block">
						<h4>Contact Details</h4>
						<ul>
							<li><a href="#">1234567890</a></li>
							<li><a href="#contact">kwyk@gmail.com</a></li>
							<li><a href="#">123, D-1, Utsav Square,
									Next to Pebbles, Kothrud,
									Pune - 41102</a></li>
						</ul>
						<h5 class="social_text"><b>Follow us on</b></h5>

						<div class="facebook"><a href="http://www.facebook.com/Kwyk.One/" target="_blank"
								class="iconc"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
						<div class="twitter"><a href="http://twitter.com/kwyk_one" target="_blank" class="iconc"><i
									class="fa fa-twitter" aria-hidden="true"></i></a></div>
						<div class="instagram"><a href="http://www.instagram.com/kwyk.one/" target="_blank"
								class="iconc"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>

					</div>
				</div>

			</div>
		</div>
		<!-- Container End -->
	</footer>
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div style="height:20px;" class="row footr">
				<div style="height:20px;" class="col-sm-6 col-12">
					<!-- Copyright -->
					<div class="copyright">
						<p class="">Copyright ©
							<script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script>
							. All Rights Reserved
						</p>
					</div>
					<div class="poweredby">
						<p>Powered By <a href="index.php" class="flogo" style="color: white;"><span>Kwyk</span></a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
		<!-- To Top -->
		<div class="top-to">
			<a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
		</div>
	</footer>

	<!-- JAVASCRIPTS -->
	<script src="plugins/jQuery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/popper.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
	<!-- tether js -->
	<script src="plugins/tether/js/tether.min.js"></script>
	<script src="plugins/raty/jquery.raty-fa.js"></script>
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
	<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
	<!-- google map -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
	<script src="plugins/google-map/gmap.js"></script>

	<script src="js/script.js"></script>

</body>

</html>