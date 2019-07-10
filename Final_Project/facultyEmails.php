<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT CONCAT(f.nameFirst,' ',f.nameMiddle,' ',f.nameLast) AS faculty_name, f.rank, d.name AS department_name, fe.email AS email_address, fe.emailType as type
FROM faculty AS f, department AS d, faculty_email AS fe
WHERE f.departmentID = d.departmentID AND f.facultyID = fe.facultyID
ORDER BY f.nameLast, f.nameFirst, department_name;";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Full Name</th><th>Position</th><th>Department</th><th>Email</th><th>Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["faculty_name"] . "</td><td>" . $row["rank"] . "</td><td>" . $row["department_name"] . "</td><td>" . $row["email_address"] . "</td><td>" . $row["type"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>