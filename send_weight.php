<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";
$id= $_POST['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql = "INSERT INTO health (`record_id`, `weight`, `height`) 
 VALUES ('$id', '$_POST[weight]', '$_POST[height]')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("Location: eForm.php");
?>