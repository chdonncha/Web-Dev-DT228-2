<html>
	<head>
		<title> BookStore</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
		<body>
			<div id="container">
				<div id="header">
					<h1>BookStore</h1>
			</div>
			
			<div id="content">
			
				<div id="nav">
		
				<ul>
						<li><a class = "selected" href="index.php" >Home</a></li>
						<li><a href="userpage.php" >User Profile</a></li>
						<li><a href="books.php" >Browse Books</a></li>
						<li><a href="about.php" >About</a></li>
						<li><a href="contact.php" >contact</a></li>
					</ul>
				</div>
				
				<div id="main">
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

	
	echo "Welcome ". $_SESSION['Username'] . " This is your profile";
	
	$validUser = mysql_real_escape_string($_SESSION['Username']);
	$query = mysql_query("SELECT * FROM Users WHERE Username = '$validUser' ");
	
//	$query = mysql_query("SELECT * FROM Users WHERE = '.$_SESSION['Username'].'" or die(mysql_error());
	
	$row = mysql_fetch_array($query);
	
	$_SESSION['Username'] = $row['Username'];
	?>
	<fieldset style="width:50%">
	
	<p><b>Username:</b>
	<?php
	echo(htmlentities($row[0]));
	echo("Your book has been reserved!");

	}
	
	else
	
	{
	
	// user logged out and is redirected back to login screen
	
	header("Location: http://localhost/WebD/Assignment%201/Bookstore/login.php");
	
	}
	
?>
</div>
<p><a href="useredit.php">Edit Account</a></p>
<p><a href="userreservations.php">Reservations</a></p>
<a href="logout.php">Log out</a>
<p>


<!-- end php here -->
				
				</div>
			</div>
			
			<div id="footer">
				Copyright &copy; 2014 Donncha Cassidy-Hand
			</div>
			
					</form>
			
		</body>
</html>
		

