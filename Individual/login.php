<?php
$con=mysqli_connect("db.sice.indiana.edu","i494f18_jrqualls","my+sql=i494f18_jrqualls", "i494f18_jrqualls");

if (mysqli_connect_errno()){ 
	echo "Failed to connect to MySQL: " .mysqli_connect_error(); 
}

$sanuname = mysqli_real_escape_string( $con, $_POST['username'] );
$sanupass = mysqli_real_escape_string( $con, $_POST['userpass'] );

$result = mysqli_query( $con,"SELECT pass FROM user WHERE username='$sanuname'" );

if ( mysqli_num_rows( $result ) > 0 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
	
		if ( password_verify( $sanupass, $row['pass']) ) {
			echo "Correct Password";
		} 
		else { 
			echo "Incorrect Password\n";
		}
	}
}
else { 
	echo "Incorrect User"; 
}
mysqli_free_result($result);
mysqli_close($con);
?>