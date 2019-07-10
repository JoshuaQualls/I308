<?php
// Create connection
$conn=mysqli_connect("db.soic.indiana.edu","i308_data","my+sql=i308_data","i308_dataset");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Grab POST Data
$roles = mysqli_real_escape_string($conn, $_POST['roles']);
$od = mysqli_real_escape_string($conn, $_POST['order_date']);
$ot = mysqli_real_escape_string($conn, $_POST['order_time']);

// Create SQL Statement
$sql = "SELECT * from emp_shift WHERE role = '$roles' AND wdate ='$od' AND ('$ot' BETWEEN time_in AND time_out)";
echo $sql;

// Get Results
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Shift ID</th><th>Employee ID</th><th>wdate</th><th>time_in</th><th>time_out</th><th>role</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["shiftid"]."</td><td>".$row["empid"]."</td><td>".$row["wdate"]."</td>
		      <td>".$row["time_in"]."</td><td>".$row["time_out"]."</td><td>".$row["role"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($conn);
?>
