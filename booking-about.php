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
	<title>Book your shows!</title>
	<link rel="stylesheet" href="assets/css/style-starter.css">
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap" rel="stylesheet">
	<!-- DROPDOWNN -->
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/css/styles.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" />

</head>

<body>

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
						DBMS </a></h1>
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
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="genre.php">Genre</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
					</ul>

					<!--/search-right-->
					<!--/search-right-->
					<div class="search-right">
						<a href="#search" class="btn search-hny mr-lg-3 mt-lg-0 mt-4" title="search">Search <span class="fa fa-search ml-3" aria-hidden="true"></span></a>
						<!-- search popup -->
						<div id="search" class="pop-overlay">
							<div class="popup">
								<form action="#" method="post" class="search-box">
									<input type="search" placeholder="Search your Keyword" name="search" required="required" autofocus="">
									<button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
								</form>
								<div class="browse-items">
									<h3 class="hny-title two mt-md-5 mt-4">Browse all:</h3>
									<ul class="search-items">
										<li><a href="genre.html">Action</a></li>
										<li><a href="genre.html">Drama</a></li>
										<li><a href="genre.html">Family</a></li>
										<li><a href="genre.html">Thriller</a></li>
										<li><a href="genre.html">Commedy</a></li>
										<li><a href="genre.html">Romantic</a></li>
										<li><a href="genre.html">Tv-Series</a></li>
										<li><a href="genre.html">Horror</a></li>
										<li><a href="genre.html">Action</a></li>
										<li><a href="genre.html">Drama</a></li>
										<li><a href="genre.html">Family</a></li>
										<li><a href="genre.html">Thriller</a></li>
										<li><a href="genre.html">Commedy</a></li>
										<li><a href="genre.html">Romantic</a></li>
										<li><a href="genre.html">Tv-Series</a></li>
										<li><a href="genre.html">Horror</a></li>
									</ul>
								</div>
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
			</div>

			<!-- Drop Down for User details -->
				<nav id="colorNav">
					<ul>
						<li class="pink">
							<a href="#" class="fa fa-user"></a>
							<ul>
								<li><a href="http://localhost/Main%20Page/main login.php">Hello,
									<?php echo $_SESSION['username']?>
								</a></li>
								<li><a href="#">Setting</a></li>
								<li><a href="http://localhost/Main%20Page/main login.php?logout=true">Logout</a></li>
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
				<a href="index.html">Home</a> » <span class="breadcrumb_last" aria-current="page">About</span>
			</div>
		</nav>
	</div>
	<!--//breadcrumbs -->
	<!-- /about-->
	<div class="w3l-ab-grids py-5">
		<div class="container py-lg-4">
			<div class="row ab-grids-sec align-items-center">
				<div class="col-lg-6 ab-right">
					<!-- <img class="img-fluid" src="assets/images/banner1.jpg"> -->
					<?php
                    echo '<img class="img-fluid" src="' . $row['movie_img'] . '" alt="">';
                    ?>
				</div>
				<div class="col-lg-6 ab-left pl-lg-4 mt-lg-0 mt-5">
					<h3 class="hny-title">Reserve Your Ticket</h3>
					<p class="mt-3">Enter the details and book your ticket.</p>




					<div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
						<i class="fas fa-2x fa-times">Go back</i>
					</div>
					<!-- <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movie_img'] . '" alt="">';
                ?>
            </div>
        </div> -->
					<div class="booking-panel-section booking-panel-section4">
						<div class="title"><?php echo $row['movie_title']; ?></div>
						<div class="movie-information">
							<table>
								<tr>
									<td>GENRE</td>
									<td><?php echo $row['movie_genre']; ?></td>
								</tr>
								<tr>
									<td>DURATION</td>
									<td><?php echo $row['movie_duration']; ?></td>
								</tr>
								<tr>
									<td>RELEASE DATE</td>
									<td><?php echo $row['movie_release']; ?></td>
								</tr>
								<tr>
									<td>DIRECTOR</td>
									<td><?php echo $row['movie_director']; ?></td>
								</tr>
								<!-- <tr>
                        <td>ACTORS</td>
                        <td><?php echo $row['movie_actors']; ?></td>
                    </tr> -->
							</table>
						</div>
						

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
                        mysqli_close($link);
                        ?>

						<?php
                        // $link1 = mysqli_connect("localhost", "root", "", "project");
                        // $sql1 = "SELECT * FROM theatre-movie WHERE m_id = $id";
                        // $result1 = mysqli_query($link1, $sql1);
                        // $rows = mysqli_fetch_all($result1,MYSQLI_ASSOC);
                        // mysqli_free_result($result1);
                        // mysqli_close($link1);
                        // $i=0;
                        ?>


						<div class="booking-form-container">
							<form action="" method="POST">




								<select name="theatre" required>
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
                        mysqli_close($link);
                        ?>



									<!-- <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option> -->



								</select>

								<select name="type" required>
									<option value="" disabled selected>TYPE</option>
									<option value="3d">3D</option>
									<option value="2d">2D</option>
									<option value="imax">IMAX</option>
									<option value="7d">7D</option>
								</select>

								<select name="date" required>
									<option value="" disabled selected>DATE</option>
									<option value="26-12-2020">December 26,2020</option>
									<option value="27-12-2020">December 27,2020</option>
									<option value="28-12-2020">December 28,2020</option>
									<option value="29-12-2020">December 29,2020</option>
									<option value="30-12-2020">December 30,2020</option>
								</select>

								<select name="hour" required>
									<option value="" disabled selected>TIME</option>
									<option value="09-00">09:00 AM</option>
									<option value="12-00">12:00 AM</option>
									<option value="15-00">03:00 PM</option>
									<option value="18-00">06:00 PM</option>
									<option value="21-00">09:00 PM</option>
									<option value="24-00">12:00 PM</option>
								</select>

								<input placeholder="First Name" type="text" name="fName" required>

								<input placeholder="Last Name" type="text" name="lName">

								<input placeholder="Phone Number" type="text" name="pNumber" required>

								<button type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
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

                                    $insert_query = "INSERT INTO 
                        booking      (  movie_title,
                                        theatre_name,
                                        show_time,
                                        show_date
                                     )
                        VALUES (        '" . $row['movie_title'] . "',
                                        '" . $_POST["theatre"] . "',
                                        '" . $_POST["hour"] . "',
                                        '" . $_POST["date"] . "')";
                                    mysqli_query($link, $insert_query);
                                }
                                ?>
							</form>
						</div>
					</div>
				</div>

				<script src="scripts/jquery-3.3.1.min.js "></script>
				<script src="scripts/script.js "></script>



				<div class="ready-more mt-4">
					<a href="#" class="btn read-button">Read More <span class="fa fa-angle-double-right ml-2" aria-hidden="true"></span></a>
				</div>
			</div>
		</div>

		<!-- <div class="w3l-counter-stats-info text-center">
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter">65</p>
							<h4>Movies</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter">165</p>
							<h4>Shows</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter">463</p>
							<h4>Members</h4>

						</div>
					</div>
				</div>
				<div class="stats_left">
					<div class="counter_grid">
						<div class="icon_info">
							<p class="counter">5063</p>
							<h4>Year of Use</h4>

						</div>
					</div>
				</div>
			</div> -->

	</div>
	</div>
	<!-- //about-->
	<!--grids-sec1-->
	<!-- <section class="w3l-team" id="team">
			<div class="grids-main py-5">
				<div class="container py-lg-4">
					<div class="headerhny-title">
						<h3 class="hny-title">Our Actors</h3>
					</div>
					<div class="owl-team owl-carousel owl-theme">
						<div class="item vhny-grid">
							<div class="d-grid team-info">
								<div class="column position-relative">
									<a href="#url"><img src="assets/images/a1.jpg" alt="" class="img-fluid rounded team-image" /></a>
								</div>
								<div class="column text-center">
									<h3 class="name-pos"><a href="#url">Dwayne johnson</a></h3>
									
									<div class="social">
										<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
										<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
										<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<div class="d-grid team-info">
									<div class="column position-relative">
										<a href="#url"><img src="assets/images/a2.jpg" alt="" class="img-fluid rounded team-image" /></a>
									</div>
									<div class="column text-center">
										<h3 class="name-pos"><a href="#url">Karen Gillan</a></h3>
										
										<div class="social">
											<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<div class="d-grid team-info">
									<div class="column position-relative">
										<a href="#url"><img src="assets/images/a3.jpg" alt="" class="img-fluid rounded team-image" /></a>
									</div>
									<div class="column text-center">
										<h3 class="name-pos"><a href="#url">Chris Hemsworth</a></h3>
										
										<div class="social">
											<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<div class="d-grid team-info">
									<div class="column position-relative">
										<a href="#url"><img src="assets/images/a4.jpg" alt="" class="img-fluid rounded team-image" /></a>
									</div>
									<div class="column text-center">
										<h3 class="name-pos"><a href="#url">Elton John</a></h3>
									
										<div class="social">
											<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<div class="d-grid team-info">
									<div class="column position-relative">
										<a href="#url"><img src="assets/images/a5.jpg" alt="" class="img-fluid rounded team-image" /></a>
									</div>
									<div class="column text-center">
										<h3 class="name-pos"><a href="#url">Liu Yifei</a></h3>
										<div class="social">
											<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<div class="d-grid team-info">
									<div class="column position-relative">
										<a href="#url"><img src="assets/images/a3.jpg" alt="" class="img-fluid rounded team-image" /></a>
									</div>
									<div class="column text-center">
										<h3 class="name-pos"><a href="#url">Chris Hemsworth</a></h3>
										
										<div class="social">
											<a href="#facebook" class="facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<a href="#twitter" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
											<a href="#linkedin" class="linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							</div>
	
						</div>
					</div>
				</div>
	
		
	
			</div>
		</section> -->
	<!--//grids-sec1-->
	<!--/testimonials-->
	<section class="w3l-clients" id="clients">
		<!-- /grids -->
		<div class="cusrtomer-layout py-5">
			<div class="container py-lg-4">
				<div class="headerhny-title">
					<h3 class="hny-title">Our Testimonials</h3>
				</div>
				<!-- /grids -->
				<div class="testimonial-width">
					<div class="owl-clients owl-carousel owl-theme mb-lg-5">
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team1.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Johnson smith</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Alexander leo</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team3.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Roy Linderson</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team4.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Mike Thyson</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team2.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Laura gill</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-content">
								<div class="testimonial">
									<blockquote>
										<q>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit beatae laudantium
											voluptate rem ullam dolore!.</q>
									</blockquote>
									<div class="testi-des">
										<div class="test-img"><img src="assets/images/team3.jpg" class="img-fluid" alt="/">
										</div>
										<div class="peopl align-self">
											<h3>Smith Johnson</h3>
											<p class="indentity">Washington</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /grids -->
		</div>
		<!-- //grids -->
	</section>
	<!--//testimonials-->
	<!--grids-sec2-->
	<!-- <section class="w3l-grids">
			<div class="grids-main py-5">
				<div class="container py-lg-4">
					<div class="headerhny-title">
						<div class="w3l-title-grids">
							<div class="headerhny-left">
								<h3 class="hny-title">New Releases</h3>
							</div>
							<div class="headerhny-right text-lg-right">
								<h4><a class="show-title" href="genre.html">Show all</a></h4>
							</div>
						</div>
					</div>
					<div class="owl-three owl-carousel owl-theme">
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m12.jpg" alt="">
									</figure>
									<div class="box-content">
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">The Hustle</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m11.jpg" alt="">
									</figure>
									<div class="box-content">
	
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">The Lego</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m9.jpg" alt="">
									</figure>
									<div class="box-content">
	
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">Joker </a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m8.jpg" alt="">
									</figure>
									<div class="box-content">
	
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">Toy story 4</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
	
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m1.jpg" alt="">
									</figure>
									<div class="box-content">
	
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">Rocketman</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
						</div>
						<div class="item vhny-grid">
							<div class="box16">
								<a href="genre.html">
									<figure>
										<img class="img-fluid" src="assets/images/m2.jpg" alt="">
									</figure>
									<div class="box-content">
	
										<h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr 4min
	
											</span>
	
											<span class="post fa fa-heart text-right"></span>
										</h4>
									</div>
									<span class="fa fa-play video-icon" aria-hidden="true"></span>
								</a>
							</div>
							<h3> <a class="title-gd" href="genre.html">Doctor Sleep</a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
							<div class="button-center text-center mt-4">
								<a href="genre.html" class="btn watch-button">Watch now</a>
							</div>
						</div>
					</div>
				</div>
	
			</div>
		</section> -->
	<!--grids-sec2-->
	<!-- footer-66 -->
	<footer class="w3l-footer">
		<section class="footer-inner-main">
			<div class="footer-hny-grids py-5">
				<div class="container py-lg-4">
					<div class="text-txt">
						<div class="right-side">
							<div class="row footer-about">
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="genre.html"><img class="img-fluid" src="assets/images/banner1.jpg" alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="genre.html"><img class="img-fluid" src="assets/images/banner2.jpg" alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="genre.html"><img class="img-fluid" src="assets/images/banner3.jpg" alt=""></a>
								</div>
								<div class="col-md-3 col-6 footer-img mb-lg-0 mb-4">
									<a href="genre.html"><img class="img-fluid" src="assets/images/banner4.jpg" alt=""></a>
								</div>
							</div>
							<div class="row footer-links">


								<div class="col-md-3 col-sm-6 sub-two-right mt-5">
									<h6>Information</h6>
									<ul>
										<li><a href="index.php">Home</a> </li>
										<li><a href="about.php">About</a> </li>
										<li><a href="#">Tv Series</a> </li>
										<li><a href="#">Blogs</a> </li>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="below-section">
				<div class="container">
					<div class="copyright-footer">
						<div class="columns text-lg-left">
							<p>&copy; 2020 ProShowz. All rights reserved | Designed by <a href="https://w3layouts.com">W3layouts</a></p>
						</div>

						<ul class="social text-lg-right">
							<li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
							</li>
							<li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
							</li>
							<li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
							</li>
							<li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
							</li>

						</ul>
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
				window.onscroll = function() {
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
<!-- stats -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- //stats -->
<!--/theme-change-->
<script src="assets/js/theme-change.js"></script>
<!-- //theme-change-->
<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
	$(document).ready(function() {
		$('.owl-team').owlCarousel({
			loop: true,
			margin: 20,
			nav: false,
			responsiveClass: true,
			autoplay: false,
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
					items: 4,
					nav: true
				}
			}
		})
	})
</script>
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
					items: 6,
					nav: true
				}
			}
		})
	})
</script>
<!-- //script -->
<!-- for tesimonials carousel slider -->
<script>
	$(document).ready(function() {
		$(".owl-clients").owlCarousel({
			loop: true,
			margin: 40,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				736: {
					items: 2,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
					loop: false
				}
			}
		})
	})
</script>
<!-- //script -->
<!-- script for owlcarousel -->
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
