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
$id = $_POST['mid'];

$mname = $_POST['mname'];
$myear = $_POST['myear'];
$mgenre = $_POST['mgenre'];
$mrating = $_POST['mrating'];

$sql = "INSERT INTO movies (mname, myear, mgenre, mrating) VALUES (?, ?, ?, ?)";
$stmt = $link->prepare($sql);

// s for string
$stmt->bind_param("sss", $mname, $myear, $mgenre, $mrating);
$result = $stmt->execute();

if ($result) {
    echo "New movie record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$link->close();
?>
