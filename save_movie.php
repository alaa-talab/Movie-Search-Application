<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Movies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$title = $_POST['title'];
$genres = $_POST['genres'];
$overview = $_POST['overview'];

// Escape the overview field to prevent SQL injection
$overview = $conn->real_escape_string($overview);

$sql = "INSERT INTO movie (id, title, genres, overview) VALUES ('$id', '$title', '$genres', '$overview')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>