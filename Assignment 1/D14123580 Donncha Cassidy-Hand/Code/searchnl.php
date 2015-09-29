<?php
session_start();
// connect to database
require "db.php";
require "loginConnection.php";
?>

<!DOCTYPE html>

<html lang="en">
<html>
	<head>
		<title>Search Engine</title>
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
						<li><a class= "selected" href="searchnl.php" >Browse Books</a></li>
						<li><a href="about.html" >About</a></li>
						<li><a href="contact.html" >contact</a></li>
					</ul>
				</div>

	<section>

	<div id="search">

	<p><h2><br><hr> SEARCH FOR BOOK </h2><hr><p>
	<p><b><center>Note: Must be logged in to Reserve Books or View Reserved Books</center></b><p><br>

	<!-- Create the search by title, category and author -->
	
	<form method="POST">
	<span>Search by Title</span>
	<p>
	<input type="text" size ='50' name="title"/>
	<button type="submit">Search</button>
	</form><p>
	
	<form method="POST">
	<span>Search by Author</span><p>
	<input type="text" size ='50' name="author"/>
	<button type="submit">Search</button>
	</form><p>

	</div>

	<div id="books">

	<form method="POST">
	<span>Search by category</span><p>
	<select name="categories">
	<option value="All">All</option>

	<?php
	$query = "SELECT * FROM categories"; 
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		echo "<option value=\"" . $row['CategoryDescription'] . "\">" . $row['CategoryDescription'] . "</option>";
	}
	
	?>
	</select>
	<button type="submit">Search</button><p><hr>
	</form>
	<!-- display the books in the reservations form. -->
	<form method="POST">

	<?php
	
	// Check to make sure page is declared and is numeric
	// otherwise set page to the first page i.e 0
	if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0)
	$page = $_GET['page'];
	else
	$page = 0;
	
	$page_query_offset = $page * 5;
	$page_url = "http://$_SERVER[HTTP_HOST]".strtok($_SERVER["REQUEST_URI"], "?");

	
	
	if( $_POST ){

		// if there is POST values create the specified sql query.
		// search category.
		if( isset( $_POST['categories'] ) ){
			$category = $_POST['categories'];
			echo"<h2>" . $category . " Books</h2><hr><p>";
			if( $category == 'All' ){
				$query = "SELECT * FROM books WHERE reserve='N' LIMIT 5 OFFSET $page_query_offset";
			}else{
				$query = "SELECT * FROM books b LEFT JOIN categories r ON b.CategoryId = r.CategoryId WHERE r.CategoryDescription='$category' AND b.reserve='N' LIMIT 5 OFFSET $page_query_offset";
				}
			} // end search by category.
			
			// search title.
			if( isset( $_POST['title'] ) ){
				$title = $_POST['title'];
				$query = "SELECT * FROM books  WHERE title LIKE '%$title%' AND reserve='N' LIMIT 5 OFFSET $page_query_offset";
			} // end search title.
			
				// search author.
				if( isset( $_POST['author'] ) ){
					$author = $_POST['author'];
					$query = "SELECT * FROM books  WHERE author LIKE '%$author%' AND reserve='N' LIMIT 5 OFFSET $page_query_offset";
				} // endd search by author.
				
					// start the query and display the books.
					if( isset( $_POST['categories'] ) || isset( $_POST['title'] ) || isset( $_POST['author'] ) ){
						$result = mysql_query($query);
						while($row = mysql_fetch_array($result)){
						echo '<br><table border=1>'."\n";
						echo "<tr><td>";
						echo "<li><p>BookName: ". $row['title'] . "<p>Author: " . $row['author'] . "<p>Year Released: " . $row['year'] . "<p>";
						echo '</table><p>';
						}
					}// end start the query and display the books
					}
					else {
					
				// if there is no post values, show all the available books
				$query = "SELECT * FROM books WHERE reserve='N' LIMIT 5 OFFSET $page_query_offset";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
					echo '<br><table border=1>'."\n";
					echo "<tr><td>";
					echo "<li><p>BookName: ". $row['title'] . "<p>Author: " . $row['author'] . "<p>Year Released: " . $row['year'] . "<p>";
					echo '</table><p>';
					}
					
	
			
			}
	
			$next_page = $page_url."?page=" . ($page + 1);
			$previous_page = $page_url."?page=" . max(($page - 1), 0);
			echo "<a href=\"$previous_page\">Previous Page</a><p> <a href=\"$next_page\">Next Page</a>";

?>

</form>
</div>

			</section>

			<div id="footer">
				Copyright &copy; 2014 Donncha Cassidy-Hand
			</div>
			
					</form>
			
		</body>
</html>