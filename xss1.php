<!DOCTYPE html>
<html>
    <head>
        <meta content="" charset="UTF-8" >
        <title> XSS LAB1 </title>
    </head>
    <body>
        <form action="" method="get">
            <label>Username: </label>  
            <input type="text" name="username" value="" >
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
 session_start();
 $user = $_GET['username'];
 if(isset($user)){
    //$replace = preg_replace("<script>", "", $user);
    $replace = preg_replace("/<script.*?>.*?<\/script>/is", "", $user);
    echo "Hi " . $replace;
 }else{
    echo "ma tajarab ya akhaa ant hatakhsar hajah :)";
 }
?>