<!doctype html>
<html>

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Book Your Shows!</title>
	<link rel="stylesheet" href="assets/css/select.css">
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
	<!-- DROPDOWNN -->
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/css/styles.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" />
</head>

<body>
		<!-- header -->
		<header id="site-header" class="w3l-header fixed-top" >
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
				<div class="container">
					<h1><a class="navbar-brand" href="select_theatre.php"><span class="fa fa-film" aria-hidden="true"></span>
					BookYourShow </a></h1>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
						aria-label="Toggle navigation">
						<!-- <span class="navbar-toggler-icon"></span> -->
						<span class="fa icon-expand fa-bars"></span>
						<span class="fa icon-close fa-times"></span>
					</button>
	
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="select_theatre.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="display_theater.php">View Bookings</a>
							</li>
						</ul>
	
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
								<li><a href="http://localhost/Main%20Page/admin login.php">Hello,
									<?php echo $_SESSION['username']?>
								</a></li>
								<li><a href="http://localhost/Main%20Page/admin login.php?logout=true">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- Drop down ends -->

			</nav>
			<!--//nav-->
		</header>
		<!-- //header -->
		<!--/breadcrumbs -->
		<div class="w3l-breadcrumbs">
			<nav id="breadcrumbs" class="breadcrumbs">
				<div class="container page-wrapper">
				<a href="select_theatre.php">Home</a> » <span class="breadcrumb_last" aria-current="page">Select Operation</span> » <span class="breadcrumb_last" aria-current="page">Delete Movie from Theater</span>
				</div>
			</nav>
		</div>
 <!--//breadcrumbs -->
	  <!-- contact1 -->
	  <?php
        $conn = mysqli_connect('localhost','root','','project');

        if(!$conn){
            echo "Connection Error : " . mysqli_connect_error();
        }
        ?>

		<section class="w3l-contact-1">
        	<div class="contacts-9 py-5">
            	<div class="container py-lg-4">
					<div class="headerhny-title text-center">
						<h4 class="sub-title text-center">Remove Movies!</h4>
						<p class="hny-title mb-lg-5 mb-4">Please select a movie, to be removed from your theater.</p>
					</div>
		
					<div class="contact-view mt-lg-5 mt-4">
                    	<div class="container">
                        	<div class="row">
                            	<div class="col-lg-2"></div>
                            		<div class="col-lg-8">
										<?php
											$id = $_GET['id'];
											echo '<form action="delete.php?id=' . $id .'" method="post">';
												// echo '<div class="select left">';
													echo '<select style ="background: var(--theme-lite);border: 1px solid var(--theme-border);     border-radius: 6px;width: 300px;height: 55px;color: var(--theme-para);    padding: 14px;margin-left: 210px;"name="movies">';
														echo '<option selected disabled>SELECT MOVIE TO DELETE</option>';
															$sql = "SELECT * FROM movie WHERE movie_id IN (SELECT movie_id FROM `theatre-movie` WHERE t_id = $id)";
															$result = mysqli_query($conn,$sql);
															$movies = mysqli_fetch_all($result,MYSQLI_ASSOC);

															foreach($movies as $movie){
																echo   '<option value="' . $movie['movie_id'] . '">' . $movie['movie_title'] . '</option>';
															}
													echo '</select>';
												// echo '</div>';
												echo '<div class="submithny text-center mt-5">';
													echo '<button type="submit" name="delete" class="btn btn-primary">DELETE</button>';
												echo '</div>';
											echo '</form>';
										?>
									</div>
                            	<div class="col-lg-2"></div>
                        	</div>
                    	</div>
                	</div>
				</div>
			</div>
		</section>
	  <!-- /contact1 -->
	<!-- footer-66 -->
	<footer class="w3l-footer">
		<section class="footer-inner-main">
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
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- Template JavaScript -->
<!--/theme-change-->
<script src="assets/js/theme-change.js"></script>
<!-- //theme-change-->
<!-- disable body scroll which navbar is in active -->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- disable body scroll which navbar is in active -->
<!--/MENU-JS-->
<script>
	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();

		if (scroll >= 80) {
			$("#site-header").addClass("nav-fixed");
		} else {
			$("#site-header").removeClass("nav-fixed");
		}
	});

	//Main navigation Active Class Add Remove
	$(".navbar-toggler").on("click", function () {
		$("header").toggleClass("active");
	});
	$(document).on("ready", function () {
		if ($(window).width() > 991) {
			$("header").removeClass("active");
		}
		$(window).on("resize", function () {
			if ($(window).width() > 991) {
				$("header").removeClass("active");
			}
		});
	});
</script>
<!--//MENU-JS-->
<script src="assets/js/bootstrap.min.js"></script>
