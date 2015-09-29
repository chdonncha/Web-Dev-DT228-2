<html>
	<head>
		<title>Userpage</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
		<body>
			<div id="container">
				<div id="header">
					<h1>Don's Book Reservations</h1>
			</div>
			
			<div id="content">
			
				<div id="nav">
		
				<ul>
						<!-- Navigation bar -->
						<li><a href="index.html" >Home</a></li>
						<li><a class = "selected" href="userpage.php" >User Profile</a></li>
						<li><a href="search.php" >Browse Books</a></li>
						<li><a href="about.html" >About</a></li>
						<li><a href="contact.html" >contact</a></li>
					</ul>
				</div>
				
				<div id="userdetails">
				
				<p>
				
<!-- start php here -->
				<?php

 define('DB_HOST', 'localhost');
 define('DB_NAME', 'book'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD','');

 $con=mysql_connect('localhost', 'root', '') or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db('book',$con) or die("Failed to connect to MySQL: " . mysql_error()); 
 
session_start();

	if(!empty($_SESSION['Username'])) { 
	
	echo "<p><h2><br><hr> WELCOME ". $_SESSION['Username'] . "!</h2><hr><p><br> ";
	
	$validUser = mysql_real_escape_string($_SESSION['Username']);
	$query = mysql_query("SELECT * FROM Users WHERE Username = '$validUser' ");
	
//	$query = mysql_query("SELECT * FROM Users WHERE = '.$_SESSION['Username'].'" or die(mysql_error());
	?> <div id="main"> <?php
	$row = mysql_fetch_array($query);
	
	$_SESSION['Username'] = $row['Username'];
	?>
	<fieldset style="width:50%">
	<legend>Account Details</legend> 
	<p><b>Username:</b>
	<?php
	echo(htmlentities($row[0]));
	echo("</td><td>");
	?>
	<p><b>Password:</b>
	<?php
	echo(htmlentities($row[1]));
	echo("</td><td>");
	?>
	<p><b>Email:</b>
	<?php
	echo(htmlentities($row[2]));
	echo("</td><td>\n");
	?>
	<p><b>First Name:</b>
	<?php
	echo(htmlentities($row[3]));
	echo("</td><td>\n");
	?>
	<p><b>Sur Name:</b>
	<?php
	echo(htmlentities($row[4]));
	echo("</td><td>\n");
	?>
	<p><b>Address Line 1:</b>
	<?php
	echo(htmlentities($row[5]));
	echo("</td><td>\n");
	?>
	<p><b>Address Line 2:</b>
	<?php
	echo(htmlentities($row[6]));
	echo("</td><td>\n");
	?>
	<p><b>City:</b>
	<?php
	echo(htmlentities($row[7]));
	echo("</td><td>\n");
	?>
	<p><b>Telephone Number:</b>
	<?php
	echo(htmlentities($row[8]));
	echo("</td><td>\n");
	?>
	<p><b>Mobile Number:</b>
	<?php
	echo(htmlentities($row[8]));
	echo("</td><td>\n");
	
	}
	
	else
	
	{
	
	// user logged out and is redirected back to login screen
	
	header("Location: http://localhost/WebD/Assignment%201/Bookstore/login.php");
	
	}
	
	?>
	</fieldset>
	<p><a href="edituser.php">Edit Account</a></p>
	<p><a href="viewreserved.php">Reservations</a></p>
	<a href="logout.php">Log out</a>
	<p><br>

<!-- end php here -->
				
				</div>
			</div>
			
			<div id="footer">
				Copyright &copy; 2014 Donncha Cassidy-Hand
			</div>
			
					</form>
			
		</body>
</html>
		

