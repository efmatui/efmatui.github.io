<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
//$sql = "CREATE TABLE Customers (
//CustomerID VARCHAR(15) NULL PRIMARY KEY, 
//CitizenID VARCHAR(13) NULL UNIQUE,
//Firstname VARCHAR(50) NOT NULL,
//Lastname VARCHAR(50) NOT NULL,
//)";

$sql = "INSERT INTO Customers (CustomerID, CitizenID, Firstname,Lastname)
VALUES ('A00000002', '1100922994161', 'First2','Last2')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<body>
</body>
</html>