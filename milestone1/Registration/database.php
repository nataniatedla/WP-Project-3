<?php

$host = "localhost";
$dbname = "kajibade1";
$username = "kajibade1";
$password = "kajibade1";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
	echo "Could not connect to server \n";
    die("Connection error: " . $mysqli->connect_error);
}
else {
	echo "Connection established\n";
} 

CREATE TABLE user (
id            INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY , 
name          VARCHAR(128) NOT NULL , 
email         VARCHAR(255) NOT NULL UNIQUE, 
password_hash VARCHAR(255) NOT NULL 
) ;

if($mysqli->query($sql) === TRUE) {
	echo "Users table created";
} else {
	echo "Error creating table: " . $mysqli->error;
}
$mysqli->close();

return $mysqli;

