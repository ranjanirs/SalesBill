<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dbSales";


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


	// Database Connection
	//$con=mysqli_connect($dbhost, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
	//$db=mysqli_select_db($dbname, $con) or die ('I cannot select the database because: ' . mysql_error());


?>