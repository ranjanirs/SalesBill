
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DbSales";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



// sql to create table
$sql = "CREATE TABLE tblSales (
 SalesId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 Saldat1 date NOT NULL,
 Invoiceno varchar(500) NOT NULL,
 Quantity int(10) NOT NULL,
 rate varchar(100) NOT NULL,
 amt varchar(100) NOT NULL 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table tblSales created successfully \n";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE tblproduct (
 productId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 productname varchar(100) NOT NULL
 )";

if ($conn->query($sql) === TRUE) {
    echo "Table tblpurchase created successfully \n";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE tblparty (
 partyId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 partyname varchar(100) NOT NULL, 
 addr varchar(500) NOT NULL,
 phoneno int(10) NOT NULL
 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table tblsalescreated successfully \n";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>