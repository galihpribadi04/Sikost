<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u_password FROM user where u_email=".$_POST['email'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($row["password"]==md5($_POST["password"])){
		
		}
	}
} else {
    echo "0 results";
}


$sql = "SELECT p_password FROM pemilik where p_email=".$_POST['email'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($row["password"]==md5($_POST["password"])){
		
		}
	}
} else {
    echo "0 results";
}
$conn->close();
?>
