<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Segment 11</title>
</head>
<body>
	<h1>Segment 11</h1>
</body>
<?php
// Create connection
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "dreamhome";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$result = mysqli_query($conn,"SELECT type, AVG(rent) FROM propertyforrent GROUP BY type");
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
echo "<table border='1'>
<tr>

<th>type</th>
<th>rent</th>


</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row[0] . "</td>";
	echo "<td>" . $row[1] . "</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($conn);

?>

</html>