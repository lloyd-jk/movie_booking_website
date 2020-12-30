<!-- Errors 
No    -   Description
404   -   Username already taken
405   -   Invalid password or username

-->
<?php
	session_start();	

	if (strpos($_SERVER['REQUEST_URI'], 'logout') !== false) {
		session_unset();
		session_destroy();
		header('Location: http://localhost/Main%20Page/admin login.php');
	}
	// echo $_SESSION['username'];
?>

<?php

$conn = mysqli_connect('localhost','root','','project');

    if(!$conn){
        echo 'Connection error'.mysqli_connect_error();
    }

if (isset($_POST['login'])){     
    $username=mysqli_real_escape_string($conn,$_REQUEST['username']);
	$password=mysqli_real_escape_string($conn,$_REQUEST['password']);
	$_SESSION['username']= $username;
	
    $sql="SELECT * FROM `admin_login` WHERE username='$username'";
    $sql1=mysqli_query($conn,$sql);
    $output=mysqli_fetch_all($sql1,MYSQLI_ASSOC);
    if(!($sql1)){
        echo mysqli_error($conn);
    }
	if(count($output)==1 && (strcmp($output[0]['password'],$password)==0))
	{
		header('Location: http://localhost/Main%20Page/select_theatre.php');
		exit();
    }
	header('Location: http://localhost/Main%20Page/admin%20login.php?id=405');
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
	</script>
	
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">

</head>

<body>

<section class="main">
	<div class="layer">
		
		<div class="bottom-grid">
			<span></span>
			<div class="links">
				<ul class="links-unordered-list">
					<li class="active">
						<a href="main login.php" class="">User login</a>
					</li>
					<li class="active">
						<a href="websiteadmin login.php" class="">Website Admin login</a>
					</li>
					<li class="">
						<a href="http://localhost/Main%20Page/index.php" class="">Browse</a>
					</li>
					<li class="">
						<a href="contact.php" class="">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center icon">
                <i class="fa fa-spinner fa-spin" style="font-size:24px;color:white"></i>
				<span style="font-size:24px;;color:white">Admin Login</span>
			</div>
			<div class="content-bottom">

				<!-- FORM -->
				<form action="#" method="post">
					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="username" id="username" type="text" placeholder="Admin Username" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="password" id="password" type="Password" onmouseover="this.type='text'"
							onmouseout="this.type='password'" placeholder="Password">
						</div>
					</div>
					<span id='message1'>
						<?php
                        if (strpos($_SERVER['REQUEST_URI'], '405') !== false) {
							echo 'Invalid username/password';
                        }
						?>
						<script>
							document.getElementById('message1').style.color = 'lightcoral';
						</script>
					</span>
					<div class="wthree-field">
						<button type="submit" name="login" class="btn">Login</button>
					</div>
					<br>
					<ul class="list-login-bottom">
						<li class="">
							<a href="admin create_acc.php" class="">Create Account</a>
						</li>
						<li class="">
							<a href="http://localhost/Main%20Page/contact.php" class="text-right">Need Help?</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</form>
			</div>
		</div>
    </div>
</section>

</body>
</html>
