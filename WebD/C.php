
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Concatenation of Strings</title>

<body>

<?php
		
$www = 123;
$msg = $www > 100 ? "Large" : "Small" ;
echo "First: $msg \n";
$msg = ( $www % 2 == 0 ) ? "Even" : "Odd";
echo "Second: $msg \n";
$msg = ( $www % 2 ) ? "Odd" : "Even";
echo "Third: $msg \n";?>

?>

</body>
</html>