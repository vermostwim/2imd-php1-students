<?php
	include_once "Classes/User.class.php";
	if(isset($user)){
		if($user->is_loggedin()!="")
		{
			header('location: createpost.php');
		}
	}

	if(isset($_POST['btnSignup'])) {

		$user = new User();
		$user->Email = $_POST['email'];
		$user->Password = $_POST['password'];
		$user->Name = $_POST['name'];
		if($user->register()){
			$feedback = "Account made.";
		}
	}

	if(isset($_POST['btnLogin'])){
		$user = new User();

		$email = $_POST['loginEmail'];
		$password = $_POST['loginPassword'];
		if($user->login($email, $password)){
			header('location: createpost.php');
		}
		else{
			$feedback = "Wrong password or email.";
		}

	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">
</head>
<body>
	<nav>
		<?php if(isset($_SESSION['loggedin'])): ?>
			<a href="logout.php">Logout</a>
		<?php else: ?>
			<a href="index.php">Login</a>
		<?php endif; ?>
	</nav>

	<header>
		<h1>Welcome to IMD-Talks</h1>
		<h2>Find out what other IMD'ers are building around you.</h2>
	</header>
	
	<div id="rightside">

	<section id="login">
		<?php if(isset($feedback)){ ?>
			<h2><?php echo $feedback ?></h2>
		<?php } ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="loginEmail" placeholder="Email" />
		<input type="password" name="loginPassword" placeholder="Password" />
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>

		<input type="submit" name="btnLogin" value="Sign in" />
		</form>
		
	</section>	
	
	<section id="signup">
	
		<h2>New to IMD-Talks? <span>Sign Up</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="name" placeholder="Full name" />
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" name="btnSignup" value="Sign up for IMD Talks" />
		</form>
	</section>
	</div>
</body>
</html>