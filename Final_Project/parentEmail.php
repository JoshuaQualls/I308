<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT DISTINCT CONCAT(s.nameFirst, ' ', s.nameMiddle, ' ', s.nameLast) AS 'Full Name', spe.email AS 'Parent Email', spe.emailType AS 'Email Type'
FROM student AS s, student_parent_email AS spe
WHERE s.studentID = spe.studentID
ORDER BY s.nameLast;";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Full Name</th><th>Parent Email</th><th>Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Full Name"] . "</td><td>" . $row["Parent Email"] . "</td><td>" . $row["Email Type"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);