<?php
$con = mysqli_connect("db.soic.indiana.edu", "i308f18_team82", "my+sql=i308f18_team82", "i308f18_team82");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
} else {
    echo nl2br("Established Database Connection \n");
}

//escape variables for security sql injection
$sTitle     = mysqli_real_escape_string($con, $_POST['title']);
$sPublisher = mysqli_real_escape_string($con, $_POST['pub']);

//rest of the variables
$price  = $_POST['price'];
$pYear  = $_POST['pyear'];
$format = $_POST['format'];
$bID    = $_POST['bid'];

//Insert query to insert form data into the album table
$sql = "INSERT INTO album (published_year, title, price, publisher, format, bid) VALUES ('$pYear','$sTitle','$price','$sPublisher','$format','$bID')";
//check for error on insert
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "1 record added";
mysqli_close($con);
?>