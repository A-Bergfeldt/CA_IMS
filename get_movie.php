<?php
error_reporting(E_ERROR | E_PARSE);

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname); 

$search = $_GET['search'];

if (mysqli_connect_error()) { 
    die("Connection failed: " . mysqli_connect_error());  
}
echo '<form action="get_movie.php" method="GET"> Search for a movie here:  <input type="text" name="search"><input type="submit" value="Search"><br>';

$sql2 = "SELECT * FROM `movies` INNER JOIN genres ON genres.gid=movies.mgenreid WHERE mname LIKE '%$search%'";

$result = $link->query($sql2);
if (! empty( $search)) {
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc() ){
        echo "<tr><td>" . $row["mname"] . "</td><td>" . $row["myear"] . "</td><td>" . $row["mgenre"] . "</td><td>" . $row["mrating"] . "</td></tr><br>";
    }
    } else {
        echo "0 records";
    }
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