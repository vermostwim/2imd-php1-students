<?php
    include_once 'Classes/Tweet.class.php';
	session_start();

    if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
	}
	else{
		header('location: index.php');
	}
	$result = new Tweet();
	$posts = $result->getAll($id);

	if(isset($_POST['btnCreatePost'])){

		$text = $_POST['post'];

		$tweet = new Tweet();
        $tweet->id = $id;
        $tweet->tweet = $text;
        $tweet->save();
        header("Refresh:0");

	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">
	<style>


	</style>
</head>
<body>
	<nav>
		<span class="name"> Hello, <?php echo $_SESSION['name'];  ?></span>
		<a href="logout.php"Logout>Logout</a>
	</nav>
	
	<div id="container">	
	<section id="newpost">
		<form action="" method="post">
			<label for="post">What's on your mind?</label>	
			<textarea name="post" id="post" cols="30" rows="2" maxlength="140"></textarea>
			<input type="submit" name="btnCreatePost" value="Send" />
		</form>

	</section>
	
	<section id="tweets">
		<h2>Your posts</h2>
        <?php

        while($p = $posts->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="post"><p><?php echo htmlspecialchars($p['post']); ?></p></div>
        <?php endwhile; ?>

    </section>
	</div>
</body>
</html>