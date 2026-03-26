<?php
//This is the database connection configuration
$host = 'localhost'; //Localhost is the server whereby MySQL is running
$dbname = 'student_registration'; //This is the name of the database
$username = 'root'; //Default username for Mysql
$password = '';    //Empty password

//This is a new mysqli connection object with the parameters host, username, password and dbname
$conn = new mysqli($host, $username, $password, $dbname);

//The if statement is used to check whether the database connection was successful
if ($conn->connect_error) {
    //If it fails, this error message will be displayed
    die("Connection failed: " . $conn->connect_error);
}

//If it is connected, the $conn object will be used to execute queries.
?>
