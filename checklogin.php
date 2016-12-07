<!-- User Login Authentication -->

<?php
// create session and call read session save handler to populate $_SESSION superglobal with session date 
session_start();

// Connect to server and first_db database
$mysqlServer = mysqli_connect("localhost", "root", "", "first_db");

// Check connection for errors
if ($mysqlServer->connect_errorno) {
    // output 
    printf("Failed to connect to server: %s\n", $mysqlServer->connect_error);
    // exit upon connection error
    exit();
}

// POST username and password to web server
// Escape strings to protect against SQL injections
$username = $mysqlServer->real_escape_string($_POST['username']);
$password = $mysqlServer->real_escape_string($_POST['password']);

// store login time
$_SESSION['time'] = time();

?>