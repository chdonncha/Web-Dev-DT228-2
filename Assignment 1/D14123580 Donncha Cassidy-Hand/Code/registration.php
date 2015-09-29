<html>
	<head>
		<title> BookStore</title>
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
					<p><h2><br><hr> REGISTER NEW USER </h2><hr><br><p>
				<div id="main">
				
				<body id="body-color"> 
				<div id="Sign-In">
				<fieldset style="width:60%">
				
						<legend>REGISTER HERE</legend> <?php
					require_once "db.php";
					if ( isset($_POST['Username']) && isset($_POST['Password'])
						&& isset($_POST['Email']) && isset($_POST['FirstName'])
						&& isset($_POST['SurName']) && isset($_POST['AddressLine1'])
						&& isset($_POST['AddressLine2']) && isset($_POST['City'])
						&& isset($_POST['Telephone']) && isset($_POST['Mobile'])) {

						$u = trim($_POST['Username']);
						$p = trim($_POST['Password']);
						$e = trim($_POST['Email']);
						$f = trim($_POST['FirstName']);
						$s = trim($_POST['SurName']);
						$a = trim($_POST['AddressLine1']);
						$b = trim($_POST['AddressLine2']);
						$c = trim($_POST['City']);
						$t = trim($_POST['Telephone']);
						$m = trim($_POST['Mobile']);
						
						// check if username or email is already in use
						$q = mysql_query("SELECT * FROM users WHERE Username = '". $u ."' OR email = '". $e ."'"); 
						if (mysql_num_rows($q) > 0) 
						{ 
							 echo '<p><b><center>error: Username or email already in use</center></b>'; 
						}
						else
						{
						
							// integer mobile not allowed to be longer than 10
							if (strlen($m) >= 10){
							
								echo "<p><b><center>error: mobile number longer than 10</center></b>";
								}
								else
								{
							
								// string password not allowed to be longer than 6
								if (strlen($p) >= 6){
								
									echo "<p><b><center>error: password longer than 6</center></b>";
									}
									else
									{
								
									// check if passwords from Password and ConfPassword match
									if ($_POST['Password'] == $_POST['ConfPassword']) {
									
										// check if all text boxes are filled in
										if($u != null and $p != null and $e != null and $f != null and $s != null and $a != null and
										$b != null and $c != null and $t != null and $m != null)
										{
											$sql = "INSERT INTO users (UserName, Password, Email, FirstName, SurName, AddressLine1, AddressLine2,
											City, Telephone, Mobile )
											VALUES ('$u', '$p', '$e', '$f', '$s', '$a', '$b', '$c', '$t', '$m')";
											echo "<p><b><center>Success</center></b>";
											mysql_query($sql);	
											}
											else 
											{
												echo "<p><b><center>All fields havn't been entered in!</center></b>";
											} // end error check all boxes filled in
												} // end check if all fields are filled in
												else
												{
												echo "<p><b><center>Passwords do not match</center></b>";	
									} // end error check password matching
								} // end error check password no longer than 6
							} // end error check mobile num no longer than 10
						} // end error check if username is already in use
					} // end of post
					?>
					
					<p><b><h3>Add A New User</h3></b></p><br>
					<!-- Display text fields -->
					<form method="post">

					<p><b>UserName:</b><br>
					<textarea type="text" name="Username" cols="40" rows="1" ></textarea></p>
					username must be unique
					
					<p><b>Password:</b><br>
					<input type="password" name="Password" ><p>
					max password length is 6 characters
					
					<p><b>Confirm Password:</b><br>
					<input type="password" name="ConfPassword" ></p> 
		
					<p><b>Email:</b><br>
					<textarea type="text" name="Email" cols="40" rows="1"></textarea></p>
		
					<p><b>FirstName:</b><br>
					<textarea type="text" name="FirstName" cols="40" rows="1"></textarea></p>

					<p><b>SurName:</b><br>
					<textarea type="text" name="SurName" cols="40" rows="1"></textarea></p>
		
					<p><b>AddressLine 1:</b><br>
					<textarea type="text" name="AddressLine1" cols="40" rows="5"></textarea></p>

					<p><b>AddressLine 2:</b><br>
					<textarea type="text" name="AddressLine2" cols="40" rows="5"></textarea></p>

					<p><b>City:</b><br>
					<textarea type="text" name="City" cols="40" rows="1" ></textarea></p>

					<p><b>Telephone num:</b><br>
					<textarea type="text" name="Telephone" cols="40" rows="1" ></textarea></p>

					<p><b>Mobile num:</b><br>
					<textarea type="text" name="Mobile" cols="40" rows="1" ></textarea></p>
					max mobile num length is 10 characters
		
					<p><input type="submit" value="Submit"/></p>

					</form></p>
				</div>
				<p><br>
			</div>
			
			<div id="footer">
				Copyright &copy; 2014 Donncha Cassidy-Hand
			</div>
			
					</form>
			
		</body>
</html>
		


