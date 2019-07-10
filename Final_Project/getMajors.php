<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT m.name AS 'Major', d.name AS 'Department',  m.creditHours, m.requiredGPA
FROM major as m, department as d 
WHERE d.departmentID = m.departmentID";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Major</th><th>Department</th><th>Required Credit Hours</th><th>Required GPA</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Major"] . "</td><td>" . $row["Department"] . "</td><td>" . $row["creditHours"] . "</td><td>" . $row["requiredGPA"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>