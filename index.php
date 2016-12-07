<!-- Index -->

<!-- Output PHP Version -->
<?php
echo 'Current PHP version: ' . phpversion();
?>

<html>
    <head>
        <title>PHP App</title>
    </head>
    <body>
        <?php
            print ("<p>Login! If you don't have an account, register!</p>");
        ?>
        <a href="login.php"> Click here to login</a> <br/>
        <a href="register.php"> Click here to register</a>
    </body>
</html>