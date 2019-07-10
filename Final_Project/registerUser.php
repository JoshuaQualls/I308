<?php
$con = mysqli_connect("db.sice.indiana.edu", "i494f18_jrqualls", "my+sql=i494f18_jrqualls", "i494f18_jrqualls");
// Check connection
if (mysqli_connect_errno()) {
    echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n ");
}

$sUsername = mysqli_real_escape_string($con, $_POST['username']);
$sPass = mysqli_real_escape_string($con, $_POST['pass']);
$sPassConfirm = mysqli_real_escape_string($con, $_POST['passConfirm']);
$sUserFirstName = mysqli_real_escape_string($con, $_POST['firstName']);
$sEmail = mysqli_real_escape_string($con, $_POST['email']);

$hashPass = password_hash($sPass, PASSWORD_DEFAULT);
$hashPassConfirm = password_hash($sPass, PASSWORD_DEFAULT);



$sql    = "SELECT * FROM user WHERE email =" . $sEmail;
$result = $con->query($sql);
$users = false;

if ($result->num_rows > 0) {
	$users = true;
}


$sql    = "SELECT * FROM user WHERE username =" . $sUsername;
$result = $con->query($sql);
$emails  = false;

if ($result->num_rows > 0) {
	$emails = true;
}


if ($users || $emails){
echo "User already exists!";
}
else{
echo $users;
echo $emails;
	$sql    = "INSERT INTO user(username, pass, passConfirm, firstName, email) VALUES ('".$sUsername."','"
																       .$hashPass."','"
																       .$hashPassConfirm."','"
																       .$sUserFirstName."','"
																       .$sEmail."')";
									
	echo $sql;
	echo "<br>";
	if (!mysqli_query($con, $sql)) {
    		die('Error: ' . mysqli_error($con));
	}
}
mysqli_close($con);
?>