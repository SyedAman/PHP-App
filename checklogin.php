<!-- User Login Authentication -->

<?php
// create session and call read session save handler to populate $_SESSION superglobal with session date 
session_start();

// Connect to server and first_db database
$mysqlServer = mysqli_connect("localhost", "root", "", "first_db");

// POST username and password to web server
// $username = mysq
?>