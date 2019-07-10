<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
} else {
	echo("Established Database Connection \n");
}

//perform sql query
$sql    = "SELECT * FROM artist";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Gender</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["aid"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["gender"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>