<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Lab</title>  
    </head>
    <body>
        <form action="" method="GET">
            <label>Username: </label>
            <input type="text" name="username" required>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php
session_start();

 //header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';");

// Check if the request method is GET and if the 'username' parameter is set
if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['username'])){
    // Retrieve the 'username' parameter from the GET request directly without escaping 
    $xss = $_GET['username'];
    
    // Output the username ( XSS vulnerability )
    echo "Hello, " . $xss;
}
?>
