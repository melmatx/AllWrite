<!DOCTYPE html>
<html>
<head>
<meta name="theme-color" content="#302b63">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link href="https://fonts.googleapis.com/css2?family=Xanh+Mono&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/dc46a47a1d.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="media/favicon.png" />
</head>
<title>AllWrite</title>

<body>
	
	<nav>
		<p>AllWrite</p>
		
		<ul>
			<?php
			session_start();

			if ($_SESSION['loggedIn'] == true)
			{ 
				echo '<li><a href="share.html">Share Problems</a></li>';
				echo '<li><a href="browse.php">Browse Problems</a></li>';
			}
			else if ($_SESSION['loggedIn'] == false)
			{
				echo '<li><a href="login.html">Login</a></li>';
				echo '<li><a href="register.html">Register</a></li>';
			}
			?>

			<li style='float:right;'>
			  <?php 
			  	if ($_SESSION['loggedIn'] == true)
			    { 
					echo '<a href="../php/logout.php" class="user"><span>';
					echo $_SESSION["username"];
					echo ' (Logout)</span></a></li>';
			    }
			  	else if ($_SESSION['loggedIn'] == false)
			    {
					echo '<a href="login.html" class="user"><span>You are not logged in.</span></a></li>';
			    }
			  ?>
		</ul>
	</nav>

	<div class="slideshow-container">

		<div class="mySlides fade">
		<h1>Introduction</h1>
		<br>
		<p>Greetings, dear user! Welcome to the world of exploration, expression, and improvement. The developers created this platform for every user to explore and know more about themselves by posting whatever thoughts or feelings they might have. The freedom to express is fundamental, especially now that we are in the middle of a pandemic. For people to be free to express their own thoughts and know themselves more is our goal. So, IF IT'S ALRIGHT, WRITE IT ALL.</p>
		</div>

		<div class="mySlides fade">
		<h1>Basic Tutorial</h1>
		<br>
		<p>First, click the register from the "Register" from the menu bar and fill out the information needed to register. After registration, you may click the "Log in" bar and log in to your account. Now that you're logged in, you can share and browse problems. To begin, click the "Share Problems" option from the menu bar and start writing. After you're finished, click the "Browse Problems" option to view your post in public as well as other people's posts, and you can start browsing.</p>
		</div>

		<div class="mySlides fade">
		<h1>You're good to go!</h1>	
		<br>
		<p>Be free, explore, and heal yourself. Be alright and write it all. Start AllWriting!</p>
		</div>

	</div>

	<div class="dot-container">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span> 
	</div>

	<footer>
		<div class="box1">
			<h2> About us</h2>
			<div class="content">
				<p> This "AllWrite" website was originally developed as a school project at STI College in Angeles, but is now independently maintained by Mel Mathew C. Palana, the project's primary developer/programmer. "AllWrite" is a website that was created to allow users to freely share whatever they want online. </p>
			</div>
		</div>
		<div class="box2">
			<h2> Helpful links</h2>
			<a href="https://www.rethink.org/advice-and-information/about-mental-illness/learn-more-about-symptoms/worried-about-your-mental-health/" target="_blank" rel="noopener noreferrer">Are you worried about your mental health?</a>
			<br>
			<a href="https://www.nami.org/Blogs/NAMI-Blog/January-2019/Self-Help-Techniques-for-Coping-with-Mental-Illness" target="_blank" rel="noopener noreferrer">Self-help techniques for coping with mental illness</a>
		</div>
		<div class="box3">
			<a href="https://www.mentalhealth.org.uk/publications/supporting-someone-mental-health-problem" target="_blank" rel="noopener noreferrer">How to support someone with mental health problem</a>
			<br>
            <a href="https://www.mhanational.org/31-tips-boost-your-mental-health" target="_blank" rel="noopener noreferrer">31 tips to boost your mental health</a>
			<br>
            <a href="https://www.mhanational.org/time-talk-tips-talking-about-your-mental-health" target="_blank" rel="noopener noreferrer">Tips for talking about your mental health</a>
		</div>
		<div class="box4">
			<h2>Contact us</h2>
			<div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Angeles City, Pampanga</span>
            </div>
			<div class="phone">
	          	<span class="fas fa-phone-alt"></span>
	          	<span class="text">09275393573</span>
        	</div>
        	<div class="email">
				<span class="fas fa-envelope"></span>
				<span class="text">allwrite.group3@gmail.com</span>
        	</div>
		</div>
			
	</footer>

	<script src="js/index.js"></script>


</body>
</html>