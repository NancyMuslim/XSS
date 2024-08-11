<!DOCTYPE html>
<html>
    <head>
        <meta content="" charset="UTF-8" >
        <title> XSS LAB2 </title>
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
 $poc = preg_match_all("#(data|confirm|prompt|alert)#i",$user);
 if($poc){
    echo "XSS Detected!";
 }else{
    echo "ma tajarab ya akhaa ant hatakhsar hajah :)";
 }
?>