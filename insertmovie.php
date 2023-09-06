<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request
$id = $_POST['id'];

$name = $_POST['name'];
$domain = $_POST['domain'];
$propulsion = $_POST['propulsion'];

$sql = "INSERT INTO animals (name, domain, propulsion) VALUES (?, ?, ?)";
$stmt = $link->prepare($sql);

// s for string
$stmt->bind_param("sss", $name, $domain, $propulsion);
$result = $stmt->execute();

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$link->close();
?>
