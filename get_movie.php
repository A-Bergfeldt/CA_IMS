<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname); 

if (mysqli_connect_error()) { 
    die("Connection failed: " . mysqli_connect_error());  
}

echo '<table><tr><th>Name of movie</th><th>Year of release</th><th>Genre of movie</th><th>Rating</th></tr>';

$sql = "SELECT * FROM `movies`INNER JOIN genres ON genres.gid=movies.mgenreid;";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["mname"] . "</td><td>" . $row["myear"] . "</td><td>" . $row["mgenre"] . "</td><td>" . $row["mrating"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

echo '</table>';
?>