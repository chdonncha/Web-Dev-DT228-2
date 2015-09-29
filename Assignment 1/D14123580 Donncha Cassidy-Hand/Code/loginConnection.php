<?php

 define('DB_HOST', 'localhost');
 define('DB_NAME', 'book'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD','');
 
	// initalise variables to connect to database
	$con=mysql_connect('localhost', 'root', '') or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db('book',$con) or die("Failed to connect to MySQL: " . mysql_error()); 
	
	//starting the session for user profile page 
	function SignIn() { session_start(); 
	
	//checking the 'user' name which is from Sign-In.html, is it empty or have some text 
	if(!empty($_POST['user'])) 
	{ 
		
		$query = mysql_query("SELECT * FROM Users where Username = '$_POST[user]' AND Password = '$_POST[pass]'") or die(mysql_error());
		
		$User = mysql_fetch_array($query);
		
	if(!empty($User['Username']) AND !empty($User['Password'])) { 
	
		$_SESSION['Username'] = $User['Username'];	// create and name global session variable
	
		 header("Location: http://localhost/WebD/Assignment%201/Bookstore/userpage.php");
			} 
		
		else{ 
		
		 header("Location: http://localhost/WebD/Assignment%201/Bookstore/login.php?err=1");
		 
		}
	}
}
	
 if(isset($_POST['submit']))

 { SignIn(); }
 
 ?>
 