<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$courseID = $_POST['courseID'];

$sql    = "SELECT f.FacultyID AS 'FacultyID', CONCAT(f.nameFirst, ' ',f.nameMiddle, ' ', f.nameLast) AS 'Full Name' 
FROM faculty AS f 
WHERE NOT EXISTS (SELECT * FROM section AS s, course AS c
WHERE f.FacultyID=s.FacultyID 
AND s.courseID = " . $courseID . ")";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>FacultyID</th><th>Full Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["FacultyID"] . "</td><td>" . $row["Full Name"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>
