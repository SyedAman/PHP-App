<!-- User Registration Page -->

<!-- Output PHP Version -->
<?php
echo 'Current PHP version: ' . phpversion();
?>

<html>
    <head>
        <title>PHP Register Page</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a> <br><br>
        <!-- Send POST HTTP request -->
        <form action="register.php" method="POST">
            Enter Username: <input type="text" name="username" required="required"> <br>
            Enter Password: <input type="password" name="password" required="required"> <br>
            <input type="submit" value="Register">
        </form>
    </body>
</html>

<!-- Access database and add registered users -->
<?php
    // ignore warnings
    error_reporting(E_ERROR | E_PARSE);

    // Look for REQUEST_METHOD in $SERVER array created by Apache web server
    // Checks if form has received a POST request via submit button method="POST"
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Encapsulate and escape strings to add to safely add to MySQL query from SQL Injections
        $username = mysqli_real_escape_string($_POST['username']);
        $password = mysqli_real_escape_string($_POST['password']);

        // Log user registration info with concatenation
        echo "Username entered is " . $username . "<br>";
        echo "Password entered is " . $password . "<br>";

        // Add POST requests to MySQL database
        
        // Hold true or false value
        $bool = true;

        // Connect to MySQL server
        $mysqlServer = mysqli_connect("127.0.0.1", "root", "") or die ("cannot connect to MySQL server" . mysqli_error_list());
        // Select database or throw error
        mysqli_select_db("first_db") or die($mysqlServer, "cannot connect to database");
    }
?>