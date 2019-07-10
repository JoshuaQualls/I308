<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT CONCAT(f.nameFirst, ' ', f.nameMiddle, ' ', f.nameLast) AS 'Full Name', r.roomNumber, b.name
FROM faculty AS f, room AS r, building AS b
WHERE f.roomID = r.roomID
AND r.buildingID = b.buildingID;";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Full Name</th><th>Room Number</th><th>Building</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Full Name"] . "</td><td>" . $row["roomNumber"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>