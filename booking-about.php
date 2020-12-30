<?php
    session_start();
    if ($_SESSION['username']==null) {
        $_SESSION['username']='guest';
    }
?>
<!doctype html>
<html lang="zxx">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Book Your Shows!</title>
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="stylesforba.css">
	<!-- DROPDOWNN -->
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/css/styles.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" />
</head>

<body>
<style>
	body{
		overflow-x:hidden;
	}
</style>

	<?php
	$id = $_GET['id'];
	$link = mysqli_connect("localhost", "root", "", "project");

	$movieQuery = "SELECT * FROM movie WHERE movie_id = $id";
	$movieImageById = mysqli_query($link, $movieQuery);
	$row = mysqli_fetch_array($movieImageById);
	?>
	<!-- header -->
	<header id="site-header" class="w3l-header fixed-top">
		<!--/nav-->
		<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
			<div class="container">
				<h1><a class="navbar-brand" href="index.php"><span class="fa fa-film" aria-hidden="true"></span>
				BookYourShow</a></h1>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<!-- <span class="navbar-toggler-icon"></span> -->
					<span class="fa icon-expand fa-bars"></span>
					<span class="fa icon-close fa-times"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="mybooking.php">My Bookings</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
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
								<li><a href="http://localhost/Main%20Page/main login.php">Hello,
									<?php echo $_SESSION['username']?>
								</a></li>
								<!-- <li><a href="#">Setting</a></li> -->
								<li><a href="http://localhost/Main%20Page/main login.php?logout=true">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- Drop down ends -->
				</div>

		</nav>
		<!--//nav-->
	</header>

			<div class="row ab-grids-sec align-items-center">
				<div class="col-lg-6 ab-right">
					<!-- <img class="img-fluid" src="assets/images/banner1.jpg"> -->
					<?php
					echo '<img style=" margin-left: 300px;
					margin-bottom: 20px;	"class="img-fluid" src="' . $row['movie_img'] . '" alt="">';
					?>
				</div>

				
				<div class="col-lg-6 ab-left pl-lg-4 mt-lg-0 mt-5">
					<br><br><br><br><br>
					<div style="margin-left:80px;">
					<h3 class="hny-title" style = "font-size: 40px;position: relative;left: -46px;">Reserve Your Ticket</h3>
					<br>
					</div>
					
					<div >
						<div class="movietitle" style="margin-left:80px;font-size: 40px"><?php echo $row['movie_title']; ?></div>
						<div>
							<style>
								table tr td:empty {
									width: 50px;
									}
									
									table tr td {
									padding-top: 5px;
									padding-bottom: 5px;
									padding-right:20px
									}
							</style>
							<table style="margin-left:80px;">
								<tr>
									<td>GENRE        :</td>
									<td><?php echo $row['movie_genre']; ?></td>
								</tr>
								<tr>
									<td>DURATION     :</td>
									<td><?php echo $row['movie_duration']; ?></td>
								</tr>
								<tr>
									<td>RELEASE DATE :</td>
									<td> <?php echo $row['movie_release']; ?></td>
								</tr>
								<tr>
									<td>DIRECTOR     :</td>
									<td><?php echo $row['movie_director']; ?></td>
								</tr>
								<!-- <tr>
                        <td>ACTORS</td>
                        <td><?php echo $row['movie_actors']; ?></td>
                    </tr> -->
							</table>
						</div>
						<!-- check -->
						

						<?php
							$link1 = mysqli_connect("localhost", "root", "", "project");
							$sql1 = "SELECT t_name FROM theatre WHERE t_id IN (SELECT t_id FROM `theatre-movie` WHERE 1 AND movie_id = $id) ";
						?>

						<?php
						if ($result = mysqli_query($link1, $sql1)) {
							if (mysqli_num_rows($result) > 0) {
								
								mysqli_free_result($result);
							} else {
								echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
							}
						} else {
							echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link1);
						}

						// Close connection
						// mysqli_close($link);
						?>
						<!-- <br> -->

						<section class="w3l-contact-1" >
							<div class="contacts-9 py-5">
									<div class="container py-lg-4">
						<div class="booking-form-container">
							<form action="" method="POST" class="formhny-sec">




								<select class = "selectcss" style ="background: var(--theme-lite);border: 1px solid var(--theme-border);     border-radius: 6px;width: 125px;height: 55px;color: var(--theme-para);margin-right: 16px;    padding: 14px;" name="    theatre" required>
									<option value="" disabled selected>THEATRE</option>
									<?php
						if ($result = mysqli_query($link1, $sql1)) {
							if (mysqli_num_rows($result) > 0) {
								$num = mysqli_num_rows($result);
								for ($i = 0; $i < $num; $i++) {
									$row = mysqli_fetch_array($result);
									
									
									echo  '<option value="' . $row['t_name'] . '">' . $row['t_name'] . '</option>';								
									
								}
								mysqli_free_result($result);
							} else {
								echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
							}
						} else {
							echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link1);
						}

						// Close connection
						// mysqli_close($link);
						?>


								</select>
								<!-- <div class="form-input"> -->
								<select class = "selectcssdate" style ="background: var(--theme-lite);border: 1px solid var(--theme-border);border-radius: 6px;width: 170px;height: 55px;color: var(--theme-para);margin-right: 16px;    padding: 14px;" name="date" required>
									<option value="" disabled selected>DATE</option>
									<option value="26-12-2020">December 26,2020</option>
									<option value="27-12-2020">December 27,2020</option>
									<option value="28-12-2020">December 28,2020</option>
									<option value="29-12-2020">December 29,2020</option>
									<option value="30-12-2020">December 30,2020</option>
								</select>
							<!-- </div> -->

								<select class = "selectcsstime" style ="background: var(--theme-lite);border: 1px solid var(--theme-border);border-radius: 6px;width: 125px;height: 55px;color: var(--theme-para);margin-right: 16px;    padding: 14px;" name="hour" required>
									<option value="" disabled selected>TIME</option>
									<option value="09-00">09:00 AM</option>
									<option value="12-00">12:00 AM</option>
									<option value="15-00">03:00 PM</option>
									<option value="18-00">06:00 PM</option>
									<option value="21-00">09:00 PM</option>
									<option value="24-00">12:00 PM</option>
								</select>
								<br>
								<br>
								<div class="form-input">
								<input class = "nameinput" style= "width: 459px;"placeholder="First Name" type="text" name="fName" required> </div>
								<br>
								<div class="form-input">
								<input class = "nameinput" style= "width: 459px;" placeholder="Last Name" type="text" name="lName"> </div>
								<br>

								<div class="form-input">
								<input class = "phonenameinput" style= "width: 459px;" placeholder="Phone Number" type="text" name="pNumber" required> </div>

								<div class="submithny text-right mt-4" style=" margin-right: 400px;">
								<button class="btn read-button" type="submit" value="submit" name="submit">Book a Seat</button> </div>
								<?php
								$fNameErr = $pNumberErr = "";
								$fName = $pNumber = "";

								if (isset($_POST['submit'])) {


									$fName = $_POST['fName'];
									if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
										$fNameErr = 'Name can only contain letters, numbers and white spaces';
										echo "<script type='text/javascript'>alert('$fNameErr');</script>";
									}

									$pNumber = $_POST['pNumber'];
									if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
										$pNumberErr = 'Phone Number can only contain numbers and white spaces';
										echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
									}

									$id = $_GET['id'];
                                    $link = mysqli_connect("localhost", "root", "", "project");

                                    $movieQuery = "SELECT * FROM movie WHERE movie_id = $id";
                                    $movieImageById = mysqli_query($link, $movieQuery);
                                    $row2 = mysqli_fetch_array($movieImageById);

    
    

                        
                                    $insert_query = "INSERT INTO `booking` (`booking_id`, `movie_title`, `show_time`, `show_date`, `theatre_name`, `fname`, `lname`, `username`, `ph_number`) VALUES (NULL, '" . $row2['movie_title'] ."', '" . $_POST["hour"] . "', '" . $_POST["date"] . "', '" . $_POST["theatre"] . "', '" . $_POST["fName"] . "', '" . $_POST["lName"] . "', '" . $_SESSION['username'] ."' , '" . $_POST["pNumber"] . "')";
                                    // mysqli_query($link, $insert_query);
                                    if (!(mysqli_query($link, $insert_query))) {
                                        echo mysqli_error($link);
                                    }
								}
								?>
							</form>
						</div>
					</div>
				</div>
				
				</div>
				</div>
				</section>
				<script src="scripts/jquery-3.3.1.min.js "></script>
				<script src="scripts/script.js "></script>



				
			</div>
		</div>

	</div>
	</div>
	
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
