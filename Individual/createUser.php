<?php

$password = 'password';
$hashed_password = password_hash($password,PASSWORD_DEFAULT);

$query = "INSERT INTO user (username, pass) VALUES ('admin', '$hashed_password')";

echo $query;


?> 