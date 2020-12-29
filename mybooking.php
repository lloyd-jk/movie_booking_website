<?php
session_start();
if ($_SESSION['username'] == null) {
	$_SESSION['username'] = 'guest';
}
?>

<?php

$connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
mysqli_select_db($connect, 'project') or die(mysqli_error($connect));

?>

<?php

$temp = $_SESSION['username'];

$sql = "SELECT * FROM booking LEFT JOIN movie ON booking.movie_title=movie.movie_title WHERE username='$temp' ";

$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
?>

<!doctype html>
<html lang="zxx">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Booked Shows | View all your booked tickets in one place!</title>
		<link rel="stylesheet" href="assets/css/style-starter.css">
		<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap" rel="stylesheet">
		<!-- DROPDOWNN -->
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" />

		<style>
			.boxamal {
				text-align: center;


			}
		</style>
	</head>

	<body>
		<header id="site-header" class="w3l-header fixed-top">
			<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
				<div class="container">
					<h1><a class="navbar-brand" href="index.php"><span class="fa fa-film" aria-hidden="true"></span>
							BookYourShow </a></h1>
					<!-- if logo is image enable this   
							<a class="navbar-brand" href="#index.html">
								<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
							</a> -->
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<!-- <span class="navbar-toggler-icon"></span> -->
						<span class="fa icon-expand fa-bars"></span>
						<span class="fa icon-close fa-times"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item ">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="mybooking.php">My Bookings</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact.php">Contact</a>
							</li>
						</ul>

						<!--/search-right-->
						<!--/search-right-->

					</div>
					<!-- toggle switch for light and dark theme -->
					<div class="mobile-position">
						<nav class="navigation">
							<div class="theme-switch-wrapper">
								<label class="theme-switch" for="checkbox">
									<input type="checkbox" id="checkbox">
									<div class="mode-container">
										<i class="gg-sun"></i>
										<i class="gg-moon"></i>
									</div>
								</label>
							</div>
						</nav>
					</div>
					<!-- //toggle switch for light and dark theme -->
					<!-- Drop Down for User details -->
					<nav id="colorNav">
						<ul>
							<li class="pink">
								<a href="#" class="fa fa-user"></a>
								<ul>
									<li><a href="http://localhost/Main%20Page/main login.php">Hello,
											<?php echo $_SESSION['username'] ?>
										</a></li>
									<!-- <li><a href="#">Setting</a></li> -->
									<li><a href="http://localhost/Main%20Page/main login.php?logout=true">Logout</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					<!-- Drop down ends -->

			</nav>
		</header>



		<!-- //banner-slider-->
		<!-- main-slider -->
		<!--grids-sec1-->
		<section class="w3l-grids">
			<div class="grids-main py-5">
				<div class="container py-lg-4">
					<div class="headerhny-title">
						<div class="headerhny-title text-center"><br><br>
							<h3 class="sub-title"><?php echo "Hello " . $temp . " !"; ?></h3>
							<h3 class="hny-title mb-lg-5 mb-4">Shows you have booked</h3>
						</div>
						<!--<div class="headerhny-right text-lg-right">
							<h4><a class="show-title" href="genre.html">Show all</a></h4>
						</div>-->
					</div>
					<div class="w3l-populohny-grids">

						<?php while ($row = mysqli_fetch_array($query)) {  ?>
							<section>
								<!-- <div class="w3l-populohny-grids"> -->
								<div class="item vhny-grid">
									<div class="box16">
										<!-- <div class="boxamal"> -->
										<!-- <section> -->
										<!-- <a href="genre.html"> -->
										<figure>
											<img class="img-fluid" src="<?php echo $row['movie_img']; ?>" alt="<?php echo $row['movie_title']; ?>" >
										</figure>

										<!-- </section> -->
										<div class="box-content">
											<!-- <section> -->
												<!-- <div class="middle"> -->
													<h6 class="title"><strong><?php echo "Booking ID:" . $row['booking_id']; ?></strong></h4>
													<h6 class="title"><strong><?php echo "Movie:" . $row['movie_title']; ?></strong></h4>
													<h6 class="title"><strong><?php echo "Theatre Name:" . $row['theatre_name']; ?></strong></h4>
													<h6 class="title"><strong><?php echo "Show Time:" . $row['show_time'] . " hours"; ?></strong></h4>
													<h6 class="title"></strong><?php echo "Show date:" . $row['show_date']; ?></strong></h4>
											<!-- </section> -->
											<h4> <span class="post" style="text-align: center;"><span class="fa fa-clock-o"> </span><?php echo $row['movie_duration'] . "Minutes"; ?>

												</span>

												<!-- <span class="post fa fa-heart text-right"></span> -->
											</h4>
										<!-- </div> -->
									</div>
									<!-- <span class="fa fa-play video-icon" aria-hidden="true"></span> -->
									<!-- </a> -->
									<!-- </div> -->
								</div><br><br><br>
							</section>
						<?php } ?>
					</div>
				</div>
			</div>
			</div>
		</section>

		<section class="w3l-contact-1">
			<div class="contacts-9 mb-5">
				<div class="container">
					<div class="contact-view">
						<div class="conhny-form-section">
							<form name="delete_form" method="POST" action="cancelbooking.php"class="formhny-sec"> 
								<h4 class="sub-title text-center">Want to cancel any booking? <br><br></h4>
								<div class="form-input">
									<input type="text" name="delete_box" placeholder="Enter the booking ID you want to cancel: *"
										required />
								</div>
								<div class="submithny text-center mt-4">
									<button class="btn read-button" name="delete" value="Cancel booking.">Cancel Booking</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--//grids-sec1-->
		<!--grids-sec2-->

		<?php
		$link = mysqli_connect("localhost", "root", "", "project");
		$sql = "SELECT * FROM movie";
		?>
		<!-- //tabs-->
		<!-- footer-66 -->
		<footer class="w3l-footer">
			<section class="footer-inner-main">
				<div class="footer-hny-grids py-5">
					<div class="container py-lg-4">
						<div class="text-txt">
							<div class="right-side">
								<div class="row footer-about">
									<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
										<a href="articles.html"><img class="img-fluid" src="assets/images/banner1.jpg"
												alt=""></a>
									</div>
									<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
										<a href="articles.html"><img class="img-fluid" src="assets/images/banner2.jpg"
												alt=""></a>
									</div>
									<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
										<a href="articles.html"><img class="img-fluid" src="assets/images/banner3.jpg"
												alt=""></a>
									</div>
									<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
										<a href="articles.html"><img class="img-fluid" src="assets/images/banner4.jpg"
												alt=""></a>
									</div>
								</div>
								<!-- <div class="row footer-links">
									
									<div class="col-md-3 col-sm-6 sub-two-right mt-5">
										<h6>Information</h6>
										<ul>
											<li><a href="index.php">Home</a> </li>
											<li><a href="about.php">About</a> </li>
											<li><a href="main login.php">Login</a></li>
											<li><a href="contact.php">Contact</a></li>
										</ul>
									</div>
									
									<div class="col-md-3 col-sm-6 sub-two-right mt-5">
										<h6>Newsletter</h6>
										<form action="#" class="subscribe mb-3" method="post">
											<input type="email" name="email" placeholder="Your Email Address" required="">
											<button><span class="fa fa-envelope-o"></span></button>
										</form>
										<p>Enter your email and receive the latest news, updates and special offers from us.
										</p>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="below-section">
					<div class="container">
						<div class="copyright-footer">
							<div class="columns text-lg-left">
								<p>Designed by Group XVII</p>
							</div>
						</div>
					</div>
				</div>
				<!-- copyright -->
				<!-- move top -->
				<button onclick="topFunction()" id="movetop" title="Go to top">
					<span class="fa fa-arrow-up" aria-hidden="true"></span>
				</button>
				<script>
					// When the user scrolls down 20px from the top of the document, show the button
					window.onscroll = function () {
						scrollFunction()
					};

					function scrollFunction() {
						if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
							document.getElementById("movetop").style.display = "block";
						} else {
							document.getElementById("movetop").style.display = "none";
						}
					}

					// When the user clicks on the button, scroll to the top of the document
					function topFunction() {
						document.body.scrollTop = 0;
						document.documentElement.scrollTop = 0;
					}
				</script>
				<!-- /move top -->

			</section>
		</footer>
		<!--//footer-66 -->
	</body>

</html>
<!-- responsive tabs -->
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script src="assets/js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//Horizontal Tab
		$('#parentHorizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true, // 100% fit in a container
			tabidentify: 'hor_1', // The tab groups identifier
			activate: function(event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#nested-tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
		});
	});
</script>
<!-- //responsive tabs -->
<!--/theme-change-->
<script src="assets/js/theme-change.js"></script>
<!-- //theme-change-->
<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
	$(document).ready(function() {
		$('.owl-one').owlCarousel({
			stagePadding: 280,
			loop: true,
			margin: 20,
			nav: true,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					stagePadding: 40,
					nav: false
				},
				480: {
					items: 1,
					stagePadding: 60,
					nav: true
				},
				667: {
					items: 1,
					stagePadding: 80,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script -->
<script>
	$(document).ready(function() {
		$('.owl-three').owlCarousel({
			loop: true,
			margin: 20,
			nav: false,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 2,
					nav: false
				},
				480: {
					items: 2,
					nav: true
				},
				667: {
					items: 3,
					nav: true
				},
				1000: {
					items: 5,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script -->
<!-- /mid-script -->
<script>
	$(document).ready(function() {
		$('.owl-mid').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<!-- //mid-script -->

<!-- script for owlcarousel -->
<!-- Template JavaScript -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>
<!--//-->
<!-- disable body scroll which navbar is in active -->
<script>
	$(function() {
		$('.navbar-toggler').click(function() {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
	$(window).on("scroll", function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 80) {
			$("#site-header").addClass("nav-fixed");
		} else {
			$("#site-header").removeClass("nav-fixed");
		}
	});

	//Main navigation Active Class Add Remove
	$(".navbar-toggler").on("click", function() {
		$("header").toggleClass("active");
	});
	$(document).on("ready", function() {
		if ($(window).width() > 991) {
			$("header").removeClass("active");
		}
		$(window).on("resize", function() {
			if ($(window).width() > 991) {
				$("header").removeClass("active");
			}
		});
	});
</script>
<!--//MENU-JS-->

<script src="assets/js/bootstrap.min.js"></script>

<script>
	(function() {

		$("#cart").on("click", function() {
			$(".shopping-cart").fadeToggle("fast");
		});

	})();
</script>
