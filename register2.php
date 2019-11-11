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

$sql = "INSERT INTO pemilik (p_username,p_email,p_password)
VALUES (".$_POST['uname'].", ".$_POST['email'].", ".md5($_POST['password']).")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*
$sql = "INSERT INTO datakos (p_username,p_email,p_password)
VALUES (".$_POST['uname'].", ".$_POST['email'].", ".md5($_POST['password']).")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
--->ini maunya buat nambah data kos harus minta server id pemilik
*/

$conn->close();

header('location:index.html');



?>