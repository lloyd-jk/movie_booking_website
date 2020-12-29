
<?php
    session_start();
    if ($_SESSION['username']==null) {
        $_SESSION['username']='guest';
    }
?>


<?php

$connect = mysqli_connect('localhost','root','') or die(mysqli_error($connect));
mysqli_select_db($connect,'project') or die(mysqli_error($connect));

?>

<?php


$sql = "SELECT * FROM booking WHERE theatre_name = (SELECT t_name FROM theatre WHERE admin_username= '" . $_SESSION['username'] . "')";

// if(isset($_POST['search'])) {

//     $search_term = $connect -> real_escape_string($_POST['search_box']);
//     $sql .= "WHERE person_id = '{$search_term}'";
// }

$query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
//
//$sql = mysqli_query($connect,"SELECT * FROM student WHERE rollno = '$search_term'");
// echo ' Displayed ';

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookings | View all bookings in the theater here</title>
    <link rel="stylesheet" href="assets/css/display.css">
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
<!-- <h1><?php echo $_SESSION['username']; ?>'s Theater Bookings</h1></br></br> -->

		<header id="site-header" class="w3l-header fixed-top" >
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
				<div class="container">
					<h1><a class="navbar-brand" href="select_theatre.php"><span class="fa fa-film" aria-hidden="true"></span>
					BookYourShow </a></h1>
					<!-- if logo is image enable this   
							<a class="navbar-brand" href="#index.html">
								<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
							</a> -->
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
	
						<!--/search-right-->
						<!--/search-right-->
						<!-- <div class="search-right"> -->
							<!-- search popup -->
							<!-- <div id="search" class="pop-overlay">
								<div class="popup">
									<form action="#" method="post" class="search-box">
										<input type="search" placeholder="Search your Keyword" name="search"
											required="required" autofocus="">
										<button type="submit" class="btn"><span class="fa fa-search"
												aria-hidden="true"></span></button>
									</form>
								</div>
								<a class="close" href="#close">×</a>
							</div> -->
							<!-- /search popup -->
							<!--/search-right-->
						<!-- </div> -->
	
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
        
        <div class="w3l-breadcrumbs">
			<nav id="breadcrumbs" class="breadcrumbs">
				<div class="container page-wrapper">
                <a href="select_theatre.php">Home</a> » <span class="breadcrumb_last" aria-current="page">View Bookings</span>
                </div>
			</nav>
		</div>

        <section class="w3l-contact-1">
            <div class="contacts-9 py-5">
                <div class="container py-lg-4">
                    <div class="headerhny-title text-center">
                        <h1 class="sub-title2 text-center">Theater Bookings</h1>
                        <p class="hny-title mt-2 mb-lg-5 mb-4">View all bookings in your theater, right here!</p>
                    </div>
                    <table class="table-fill" >
                        <tr>
                            <thead>
                                <th class="text-left"><strong>Booking Id</strong></td>
                                <th class="text-left"><strong>First Name</strong></td>
                                <th class="text-left"><strong>Last Name</strong></td>
                                <th class="text-left"><strong>Phone Number</strong></td>
                                <th class="text-left"><strong>Movie Title</strong></td>
                                <th class="text-left"><strong>Theatre</strong></td>
                                <th class="text-left"><strong>Show Time</strong></td>
                                <th class="text-left"><strong>Show Date</strong></td>
                            </thead>    
                        </tr>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)) { ?>

                                <tr>
                                
                                    <td class="text-left"><?php echo $row['booking_id']; ?></td>
                                    <td class="text-left"><?php echo $row['fname'] ; ?></td>
                                    <td class="text-left"><?php echo $row['lname'] ; ?></td>
                                    <td class="text-left"><?php echo $row['ph_number'] ; ?></td>
                                    <td class="text-left"><?php echo $row['movie_title'] ; ?></td>
                                    <td class="text-left"><?php echo $row['theatre_name']; ?></td>
                                    <td class="text-left"><?php echo $row['show_time'] . " hours"; ?></td>
                                    <td class="text-left"><?php echo $row['show_date']; ?></td>
                                    
                                </tr>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    <footer class="w3l-footer">
		<section class="footer-inner-main">
			<!-- <div class="footer-hny-grids py-5">
				<div class="container py-lg-4">
					<div class="text-txt">
						<div class="right-side">
							<div class="row footer-about">
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="#"><img class="img-fluid" src="assets/images/banner1.jpg"
											alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="#"><img class="img-fluid" src="assets/images/banner2.jpg"
											alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="#"><img class="img-fluid" src="assets/images/banner3.jpg"
											alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="#"><img class="img-fluid" src="assets/images/banner4.jpg"
											alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div> -->
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

</body>
</html> 
<!doctype html>



<!-- <form name="delete_form" method="POST" action="cancelbooking.php">
        </br></br></br></br>
        <h2>Cancel booking</h2>
            Enter the Booking Id to Cancel: <input type="text" name="delete_box" /> 
            <input type="submit" name="delete" value="Cancel booking.">    
</form> -->
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



