<?php
session_start();

    if( isset ($_SESSION["loggedIn"]) && $_SESSION["id"])
    {
    
    }
    else
    {
        header("Location: index.php");
    }
?>

<html>
    <head>
    <title>Landing</title>
    </head>
    <body>
        <form action="index.php" method="get">
        <input type="submit" value="logOut" name="logOut">
        </form>
    </body>
</html>