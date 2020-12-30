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
$link1 = mysqli_connect("localhost", "root", "", "project");
$sql1 = "SELECT * FROM admin_login";
?>


<?php
if ($result = mysqli_query($link1, $sql1)) {
    if (mysqli_num_rows($result) > 0) {
        mysqli_free_result($result);
    } else {
        echo '<h4 class="no-annot">No users to add</h4>';
    }
} else {
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link1);
}

// Close connection
// mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin Page| Select a functionality to proceed</title>
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

        <header id="site-header" class="w3l-header fixed-top" >
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
				<div class="container">
					<h1><a class="navbar-brand" href="movie_admin.php"><span class="fa fa-film" aria-hidden="true"></span>
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
								<a class="nav-link" href="theatre_admin.php">Theatre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="movie_admin.php">Movies</a>
							</li>
                            <li class="nav-item">
								<a class="nav-link" href="#">View Bookings</a>
							</li>
						</ul>
	
						<!--/search-right-->
						<!--/search-right-->
						<div class="search-right">
							<!-- search popup -->
							<div id="search" class="pop-overlay">
								<div class="popup">
									<form action="#" method="post" class="search-box">
										<input type="search" placeholder="Search your Keyword" name="search"
											required="required" autofocus="">
										<button type="submit" class="btn"><span class="fa fa-search"
												aria-hidden="true"></span></button>
									</form>
								</div>
								<a class="close" href="#close">×</a>
							</div>
							<!-- /search popup -->
							<!--/search-right-->
						</div>
	
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
					<a href="movie_admin.php">Home</a> » <span class="breadcrumb_last" aria-current="page">Add Theatre</span>
					<h5 style="float:right;font-family: 'Open Sans', sans-serif; font-weight: 400;"><i class="fa fa-lock" aria-hidden="true"></i>
						Admin Panel</h5>
				</div>
			</nav>
		</div>
        <section class="w3l-contact-1">
            <div class="contacts-9 py-5">
                <div class="container py-lg-4">
                    <div class="headerhny-title text-center">
                        <h4 class="sub-title text-center">Theatre Details</h4>
                        <p class="hny-title mb-lg-5 mb-4">Enter the details of the theatre, to be added.</p>
                    </div>
                    <div class="contact-view mt-lg-5 mt-4">
                        <div class="conhny-form-section">
                            <form action="#" method="post" class="formhny-sec">
                                    <div class="form-grids">
                                        <div class="form-input">
                                            <input type="text" name="theatre_name" id="movie_title" placeholder="Enter Name of Theatre *" required="" />
                                        </div>
                                        <div class="form-input">
                                            <input type="text" name="location" id="genre" placeholder="Enter Location *" required />
                                        </div>
                                    </div><br>
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-8 pl-5 ml-5">
												<select class="form-input select" style ="background: var(--theme-lite);border: 1px solid var(--theme-border);color: var(--theme-para);height: 55px;padding: 15px;font-size: 16px; position:relative; left: 40px;" name="username" required >
														<option value="" disabled selected>Username</option>
														<?php
														if ($result = mysqli_query($link1, $sql1)) {
															if (mysqli_num_rows($result) > 0) {
																$num = mysqli_num_rows($result);
																for ($i = 0; $i < $num; $i++) {
																	$row = mysqli_fetch_array($result);


																	echo  '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
																}
																mysqli_free_result($result);
															} else {
																echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
															}
														} else {
															echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link1);
														}

														// Close connection
														mysqli_close($link);
														?>

													</select>
                                        	</div>
											<div class="col-lg-2"></div>
										</div>
                                    <div class="submithny text-center mt-4">
                                        <br><button class="btn read-button" name='login'>Submit Details</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
    </body>
</html>


<?php

if (isset($_POST['login'])){   

    $name = $_POST['theatre_name'];
    $location = $_POST['location'];
    $username = $_POST['username'];
   


    $sql = "INSERT INTO theatre(t_name, t_location, admin_username) VALUES ('$name','$location','$username') ";
   // $sql = "INSERT INTO student2(Names,rollno) VALUES ('$name','$rollno')";
    if(!mysqli_query($connect,$sql))
    {
        echo mysqli_error($connect);

    }
    else
    {
        echo ' Inserted';
    }
    // header("refresh:10; url=insertperson.html");
}
?> 

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