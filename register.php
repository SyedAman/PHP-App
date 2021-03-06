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

    // Connect to MySQL server and database
    $mysqlServer = mysqli_connect("127.0.0.1", "root", "", "first_db");

    // Check server connection 
    if ($mysqlServer->connect_errorno) {
        printf("Connection failed: %s\n", $mysqlServer->connect_error);
        exit();
    }
    else {
        printf("Connection successful" . "<br><br>");
    }

    // Look for REQUEST_METHOD in $SERVER array created by Apache web server
    // Checks if form has received a POST request via submit button method="POST"
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Encapsulate and escape strings to add to safely add to MySQL query from SQL Injections
        $username = $mysqlServer->real_escape_string($_POST['username']);
        $password = $mysqlServer->real_escape_string($_POST['password']);

        // Log user registration info with concatenation
        echo "Username entered is " . $username . "<br>";
        echo "Password entered is " . $password . "<br><br>";

        // Add POST requests to MySQL database
        
        // Hold true or false value
        $bool = true;

        // Select queries from users table
        if ($userQuery = $mysqlServer->query("SELECT * FROM users")) {
            // Output amount of fetched queries
            printf("Select returned %d rows.\n", $userQuery->num_rows);
        }

        // Check to see if username is already taken

        // loop through each row in users table
        while ($row = $userQuery->fetch_array())
        {
            // Throw error upon finding already taken username
            if ($username == $row['username']) {
                // Flag upon taken username
                $bool = false;
                // Output error message
                print (
                    '<script>
                        alert("Username is already taken!");
                    </script>'
                );
                // Redirects to registration page upon username taken
                print (
                    '<script>
                        window.location.assign("register.php");
                    </script>'
                );
            }
        }

        // If username not taken, insert values to table
        if ($bool) {
            // Insert username and password value into users table
            $mysqlServer->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
            // Output successful registration
            print (
                '<script>
                    alert("Successfuly registered!");
                </script>'
            );
            // Redirect to registration page upon registration
            print (
                '<script>
                    window.location.assign("register.php");
                </script>'
            );
        }
    }
?>