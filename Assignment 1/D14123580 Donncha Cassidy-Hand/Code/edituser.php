<html>
	<head>
		<title>Edit User</title>
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
						<li><a class = "selected" href="index.html" >Home</a></li>
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
				// initalise logged in user variable
				$User = $_SESSION['Username'];


					if ( isset($_POST['Username']) && isset($_POST['Password'])
					&& isset($_POST['Email']) && isset($_POST['FirstName'])
					&& isset($_POST['SurName']) && isset($_POST['AddressLine1'])
					&& isset($_POST['AddressLine2']) && isset($_POST['City'])
					&& isset($_POST['Telephone']) && isset($_POST['Mobile'])) {					
		
					// declare variables
					$u = mysql_real_escape_string($_POST['Username']);
					$p = mysql_real_escape_string($_POST['Password']);
					$e = mysql_real_escape_string($_POST['Email']);
					$f = mysql_real_escape_string($_POST['FirstName']);
					$s = mysql_real_escape_string($_POST['SurName']);
					$a = mysql_real_escape_string($_POST['AddressLine1']);
					$b = mysql_real_escape_string($_POST['AddressLine2']);
					$c = mysql_real_escape_string($_POST['City']);
					$t = mysql_real_escape_string($_POST['Telephone']);
					$m = mysql_real_escape_string($_POST['Mobile']);
		
					// update given information
					$sql = "UPDATE users SET Username='$u', Password='$p', Email='$e', FirstName='$f', SurName='$s', AddressLine1='$a', AddressLine2='$b', City='$c', Telephone='$t', Mobile='$m' WHERE Username='$User'";
		
					echo "<pre>\n$sql\n</pre>\n"; mysql_query($sql);
					echo 'Updated - <a href="index.php">Continue...</a>'; 
		
					return; 
	} 
	
				//$id = mysql_real_escape_string($_GET['id']); 
				$result = mysql_query("SELECT * FROM users WHERE Username='$User'");
				$row = mysql_fetch_row($result); 
				//$u = $_GET['User']; 
				$u = htmlentities($row[0]); 
				$p = htmlentities($row[1]);
				$e = htmlentities($row[2]);
				$f= htmlentities($row[3]); 
				$s= htmlentities($row[4]); 
				$a= htmlentities($row[5]); 
				$b= htmlentities($row[6]); 
				$c= htmlentities($row[7]); 
				$t= htmlentities($row[8]); 
				$m= htmlentities($row[9]); 

				//$id = $_GET['id']; 
				$result = mysql_query("SELECT Username, Password, Email, FirstName, SurName, AddressLine1, AddressLine2, City, Telephone, Mobile FROM users WHERE Username='$User'");
				$row = mysql_fetch_row($result);
				$u = htmlentities($row[0]); 
				$p = htmlentities($row[1]);
				$e = htmlentities($row[2]);
				$f= htmlentities($row[3]); 
				$s= htmlentities($row[4]); 
				$a= htmlentities($row[5]); 
				$b= htmlentities($row[6]); 
				$c= htmlentities($row[7]); 
				$t= htmlentities($row[8]); 
				$m= htmlentities($row[9]); 
	
?>

	<p><h2><br><hr> EDIT USER </h2><hr><p><br> <form method="post">
	<div id="main">	
	<!-- print fields to allow editing to user details -->
	<fieldset style="width:60%">
		 
	<p>Username:<p>	
	<input type="text" name="Username" value="<?php echo $u; ?>"></p> 
	<p>Password:<p>
	<input type="text" name="Password" value="<?php echo $p; ?>"></p> 
	<p>Email:<p>
	<input type="text" name="Email" value="<?php echo $e; ?>">
	<p>FirstName:<p>
	<input type="text" name="FirstName" value="<?php echo $f; ?>">
	<p>SurName:<p>
	<input type="text" name="SurName" value="<?php echo $s; ?>">
	<p>AddressLine1:<p>
	<input type="text" name="AddressLine1" value="<?php echo $a; ?>">
	<p>AddressLine2:<p>
	<input type="text" name="AddressLine2" value="<?php echo $b; ?>">
	<p>City:<p>
	<input type="text" name="City" value="<?php echo $c; ?>">
	<p>Telephone:<p>
	<input type="text" name="Telephone" value="<?php echo $t; ?>">
	<p>Mobile:<p>
	<input type="text" name="Mobile" value="<?php echo $m; ?>">
	</fieldset>
	
	</p> <input type="hidden" name="id" value="<?php echo $p; ?>"> 
	<p>
	<p><input type="submit" value="Update"/> 
	<br/><p><p>
	<a href="index.html">Cancel</a></p> </form>
	
		</div>
			</div>
			
			<div id="footer">
				Copyright &copy; 2014 Donncha Cassidy-Hand
			</div>
			
					</form>
			
		</body>
</html>
		


	
