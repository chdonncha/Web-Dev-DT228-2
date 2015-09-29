<?php
session_start();

$_SESSION = array();

session_destroy();
	
		header("Location: http://localhost/WebD/Assignment%201/Bookstore/index.html");
		
?>