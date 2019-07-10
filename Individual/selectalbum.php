<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT a.title, b.name, a.published_year, a.price, a.format FROM album as a, band as b WHERE a.bid = b.bid ORDER BY title";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Title</th><th>Year</th><th>Artist</th><th>Price</th><th>Format</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["name"] . "</td><td>" . $row["published_year"] . "</td><td>$" . $row["price"] . "</td><td>" . $row["format"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>