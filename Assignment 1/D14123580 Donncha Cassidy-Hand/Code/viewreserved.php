<html>
	<head>
		<title> Reserved Books</title>
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
						<li><a href="userpage.php" >User Profile</a></li>
						<li><a href="search.php" >Browse Books</a></li>
						<li><a href="about.html" >About</a></li>
						<li><a href="contact.html" >contact</a></li>
					</ul>
				</div>

	<?php
	session_start();
	require "db.php";
	require "loginConnection.php";
	// get logged in user
	$User = $_SESSION['Username'];
	?>

	<!DOCTYPE html>

	</head><body>
	
	<form method="POST">
	
	<?php
	echo "	<p><h2><br><hr> RESERVED BOOKS FOR: ". $_SESSION['Username'] . "!</h2><hr><p> ";
	if( $_POST ){

		echo "<center>No Books Reserved!</center><br/>";

		// If there is POST values create the specified sql query.
		// Unreserve books.
		if( isset( $_POST['unreserve'] ) ){
		
			$isbn = $_POST['unreserve'];
			$username = $User;
			
				for($i = 0; $i < count($isbn); $i++){
					// mark book as not reserved in the book table
					$query = "UPDATE books SET reserve='N' WHERE ISBN='$isbn[$i]'";
					mysql_query($query);
					// remove book from the reservation table
					$query = "DELETE FROM reservation WHERE ISBN='$isbn[$i]'";
					mysql_query($query);
				}
				
				// Show all the users reserved books.
				$query = "SELECT * FROM books b LEFT JOIN reservation r ON b.ISBN = r.ISBN WHERE r.username='$username'";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
					echo '<br><table border=1>'."\n";
					echo "<tr><td>";
					echo "<li><p>BookName: ". $row['title'] ."<p>Author: ". $row['author'] . "<p>Year Released: " . $row['year'] . "<p><br><input type=\"checkbox\" name=\"unreserve[]\" value=\"" . $row['ISBN'] . "\" checked/><span>Un-Reserve</span><p></li>";
					echo '</table><p>';
				}
			
		}
		
		}else{
			
			// Show all the users reserved books.
			$username = $User;
			$query = "SELECT * FROM books b LEFT JOIN reservation r ON b.ISBN = r.ISBN WHERE r.username='$username'";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result)){
				echo '<br><table border=1>'."\n";
				echo "<tr><td>";
				echo "<li><p>BookName: ". $row['title'] ."<p>Author: ". $row['author'] . "<p>Year Released: " . $row['year'] . "<p><br><input type=\"checkbox\" name=\"unreserve[]\" value=\"" . $row['ISBN'] . "\" checked/><span>Un-Reserve</span><p></li>";
				echo '</table><p>';
			}
		} // end if post.

	?>
	</ul><hr><p><button type="submit">Un-reserve Selected Books</button><br/><p><hr><p>
	<a href="search.php">Back to Search Engine</a><p>

	</form>
	</div>
	<div id="footer">
					Copyright &copy; 2014 Donncha Cassidy-Hand
				</div>
				
						</form>
				
			</body>
</html>
		