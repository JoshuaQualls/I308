<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}


$sql = "SELECT CONCAT(s.nameFirst,' ',s.nameMiddle,' ',s.nameLast) AS fullname, c.subject, cp.courseID AS courseID, sem.name, g.gpaGrade
FROM student AS s, section AS sec, course_prerequisite AS cp, grade AS g, course AS c, semester AS sem
WHERE s.studentID = g.studentID
AND g.sectionID = sec.sectionID
AND sec.courseID = cp.courseID
AND cp.courseID = c.courseID
AND sec.semesterCode = sem.semesterCode
AND cp.prerequisiteID NOT IN (SELECT sec.courseID
FROM student AS s, section AS sec, course_prerequisite AS cp, grade AS g
WHERE s.studentID = g.studentID
AND g.sectionID = sec.sectionID)
GROUP BY fullname
ORDER BY s.nameLast";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Name</th><th>Course Subject</th><th>Course ID</th><th>Semester</th><th>GPA Grade</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fullname"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["courseID"] . "</td><td>" . $row["name"] . "</td><td>" . $row["gpaGrade"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);

?>