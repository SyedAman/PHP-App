<!-- User Registration Page -->

<html>
    <head>
        <title>PHP Register Page</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<br><br>
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
    // Look for REQUEST_METHOD in $SERVER array created by Apache web server and see if it matches with POST requests
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape strings to add to safely add to MySQL query
        // Add unescaped strings to POST request
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Log user registration info with concatination
        echo "Username entered is " . $username . "<br>";
        echo "Password entered is " . $password . "<br>";
    }
?>