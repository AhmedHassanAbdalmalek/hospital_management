<?php
$servername = "localhost";
$username = "root";
$password = "aa01026516106";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   
}
$id = $_GET['id'];

$sql = "DELETE FROM doctor WHERE id_doctor=$id";

if ($conn->query($sql) === TRUE) {
    header("location:insertdoctor.php");
} else {    
    echo "Error deleting record: " . $conn->error;
}



$conn->close();






?>