<?php
session_start();
    include "Connection.php";
    @$input_username = $_POST["input_username"];
    @$input_password = $_POST["input_password"];
    @$login = $_POST["login"];
    @$create = $_POST["create"];

    if(isset($_GET["logOut"]))
    {
        session_unset();
        session_destroy();
    }
    if(isset($login))
    {
        $id = validateLogin($input_username, $input_password);
        
        if($id != NULL)
        {
            $_SESSION["id"] = $id;
            $_SESSION["loggedIn"] = true;
             header("Location: Landingpage.php");
        }
        else 
        {
            echo "Login failed";
        }
    }
    else if(isset($create)){
        $hashPassword = password_hash($input_password, PASSWORD_DEFAULT);
        
        if (!userExists($input_username)){
            createUser($input_username, $hashPassword);
            echo "Create user". $input_username;
        }
        else{
            echo $input_username, " Is already taken";
        }
    }
    else{
        echo "No action";
    }
?>
<html>
    <head>
    <title></title>
    </head>
    <h1>Login</h1>
    <body>
        <form method="post" action="index.php">
        Username: <input type=text name="input_username" placeholder="username"> <br>
        Password: <input type=password name="input_password" placeholder="password"> <br>
        <input type="submit" value="login" name="login">
        <input type="submit" value="Create user" name="create">            
        </form>
    </body>
</html>