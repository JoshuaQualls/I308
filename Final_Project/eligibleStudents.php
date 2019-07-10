<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

//perform sql query
$sql    = "SELECT st.studentID AS 'Student ID', CONCAT(st.nameFirst, ' ', st.nameMiddle, ' ', st.nameLast) AS Name, m.name AS Major, TRUNCATE(((SUM(c.creditHours * g.gpaGrade))/SUM(c.creditHours)),2) AS 'Overall GPA', SUM(c.creditHours) AS 'Credit Hours Taken', m.creditHours AS 'Required Credit Hours', m.requiredGPA
FROM student AS st, major AS m, student_majors AS sm, grade AS g, section AS se, course AS c
WHERE st.studentID = sm.studentID
AND m.majorID = sm.majorID
AND st.studentID = g.studentID
AND g.sectionID = se.sectionID
AND se.courseID = c.courseID
GROUP BY st.studentID, m.name
HAVING SUM(c.creditHours) >= m.creditHours
AND ((SUM(c.creditHours * g.gpaGrade))/SUM(c.creditHours)) >= m.requiredGPA
ORDER BY m.name, st.nameLast;";
$result = $con->query($sql);

//use results to build table
if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>StudentID</th><th>Name</th><th>Major</th><th>Overall GPA</th><th>Credit Hours Taken</th><th>Required Credit Hours</th><th>Required GPA</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Student ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Major"] . "</td><td>" . $row["Overall GPA"] . "</td><td>" . $row["Credit Hours Taken"] . "</td><td>" . $row["Required Credit Hours"] . "</td><td>" . $row["requiredGPA"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con);
?>