<?php
//Step 2.1 - Remove this comment when done
$con=mysqli_connect("db.soic.indiana.edu","i308f18_jrqualls","my+sql=i308f18_jrqualls", "i308f18_jrqualls");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connect_error() ); }
else 
	{ echo "Established Database Connection <br>" ;}
	
	
//Step 2.2 - Uncomment the following when instructed by removing the /* and the */ below.

$varcname = $_POST['cname'];
$caddress = $_POST['address'];
$cphone = $_POST['phone'];

$sql="INSERT INTO customer (name, address, phone) VALUES ('$varcname', '$caddress', '$cphone')";
if (mysqli_query($con, $sql))
	{echo "1 record added";}
Else
	{ die('SQL Error: ' . mysqli_error($con) ); }
mysqli_close($con);
?>
