<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'project');

        if (!$conn) {
            echo 'Connection error'.mysqli_connect_error();
        }

    if (isset($_POST['create'])) {
        $name=mysqli_real_escape_string($conn, $_REQUEST['name']);
        $username=mysqli_real_escape_string($conn, $_REQUEST['username']);
        $password=mysqli_real_escape_string($conn, $_REQUEST['password']);


        $sql = "INSERT INTO `admin_login` (name,username,password) VALUES('$name','$username','$password')";

        if (!(mysqli_query($conn, $sql))) {
            header('Location: http://localhost/Main%20Page/create_acc.php?id=404');
            exit();
        } else {
            $_SESSION['username']=$username;
            header('Location: http://localhost/Main%20Page/index.php');
            exit();
        }
}
?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Welcome to our website!</title>
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
			<div class="logo">
				<h1> <a href="index.html"><span class="fa fa-key"></span> Logo</a></h1>
			</div>
			<div class="links">
				<ul class="links-unordered-list">
					<li class="active">
						<a href="#" class="">Login</a>
					</li>
					<li class="">
						<a href="about.php" class="">About Us</a>
					</li>
					<li class="">
						<a href="create_acc.php" class="">Register</a>
					</li>
					<li class="">
						<a href="contact.php" class="">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center icon">
            <i class="fa fa-spinner fa-spin" style="font-size:24px;;color:white"></i>
				<span style="font-size:24px;;color:white">Admin Login</span>
			</div>
			<div class="content-bottom">

				<!-- FORM -->
				<form action="#" method="post">
                    <div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="name" type="text" value="" placeholder="Name" required>
						</div>
					</div>

					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="username" id= "username" placeholder="Username" required>
						</div>
					</div>
					<span id='message1'>
						<?php
                        if (strpos($_SERVER['REQUEST_URI'], '404') !== false) {
                            echo 'Username is already taken';
                        }
                        ?>
						<script>
							document.getElementById('message1').style.color = 'lightcoral';
						</script>
					</span>
					<div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="password" id= "password" type="Password" onmouseover="this.type='text'"
							onmouseout="this.type='password'" placeholder="Password" >
						</div>
                    </div>
                    <div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="password2" id= "password2" onmouseover="this.type='text'"
							onmouseout="this.type='password'" type="Password" onkeyup='Myfunction()' placeholder="Confirm Password" >
							
						</div>
					</div>
					<span id='message'></span>
					<div class="wthree-field">
						<button type="submit" name="create" class="btn">Get Started</button>
					</div>
					<ul class="list-login">
						<li class="switch-agileits">
							<label class="switch">
								<input type="checkbox">
								<span class="slider round"></span>
								keep Logged in
							</label>
						</li>
						<li>
							<a href="#" class="text-right">forgot password?</a>
						</li>
						<li class="clearfix"></li>
					</ul>
					<ul class="list-login-bottom">
						<li class="">
							<a href="admin login.php" class="">Login</a>
						</li>
						<li class="">
							<a href="#" class="text-right">Need Help?</a>
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

<script>
	function Myfunction() 
	{
		if (document.getElementById('password').value != document.getElementById('password2').value) 
		{
			document.getElementById('message').style.color = 'lightcoral';
			document.getElementById('message').innerHTML = 'Password not matching';
		}
		else
		{
			document.getElementById('message').innerHTML = '';
		}
	}
</script>
