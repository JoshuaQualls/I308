<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$building = $_POST['buildingID'];

$sql    = "SELECT s.studentID AS 'Student ID', CONCAT(s.nameFirst, ' ', s.nameMiddle, ' ', s.nameLast) AS 'Full Name', d.dormType AS 'Type'
FROM student AS s, housing_details AS hd, dorm AS d, room AS r, building AS b
WHERE s.studentID = hd.studentID
AND hd.roomID = d.roomID
AND d.roomID = r.roomID
AND r.buildingID =" . $building . "
GROUP BY s.studentID";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>StudentID</th><th>Full Name</th><th>Dorm Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Student ID"] . "</td><td>" . $row["Full Name"] . "</td><td>" . $row["Type"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>