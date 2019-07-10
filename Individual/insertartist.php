<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
} else {
    echo("Established Database Connection \n");
}

//escape variables for security sql injection
$fName = mysqli_real_escape_string($con, $_POST['first_name']);
$lName = mysqli_real_escape_string($con, $_POST['last_name']);
$DOB   = mysqli_real_escape_string($con, $_POST['DoB']);
$g     = mysqli_real_escape_string($con, $_POST['gender']);


//Insert query to insert form data into the album table
$sql = "INSERT INTO artist (fname, lname, dob, gender) VALUES ('$fName','$lName','$DOB','$g')";
//check for error on insert
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "1 record added";
mysqli_close($con);
?>
