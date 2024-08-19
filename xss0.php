<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Lab</title>  
    </head>
    <body>
        <form action="" method="get">
            <label>Username: </label>
            <input type="text" name="username" required>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php
 session_start();
 if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['username'])){
        $xss = $_GET['username'];
        echo "Hello, " . $xss;
    }
 }
?>