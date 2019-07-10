<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}


$section = $_POST['sectionID'];

$sql = "SELECT CONCAT(s.nameFirst,' ',s.nameMiddle,' ',s.nameLast) AS fullname, g.gpaGrade AS GPA
FROM student AS s, section AS se, grade AS g
WHERE g.studentID = s.studentID AND se.sectionID= g.sectionID AND se.sectionID = " . $section . "
GROUP BY fullname
ORDER BY s.nameLast";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Full Name</th><th>GPA</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fullname"] . "</td><td>" . $row["GPA"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

$sql = "SELECT TRUNCATE((AVG(g.gpaGrade)), 3) AS OverallGPA
FROM student AS s, section AS se, grade AS g
WHERE g.studentID = s.studentID AND se.sectionID= g.sectionID AND se.sectionID = " . $section;

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>Overall GPA</td><td>" . $row["OverallGPA"] . "</td></tr>";
    }
     echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);

?>