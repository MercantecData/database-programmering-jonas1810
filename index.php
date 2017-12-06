<?php
include "Connection.php";
    $input_username = $_POST["input_username"];
    $input_password = $_POST["input_passowrd"];
    $login = $_POST["login"];
    $create = $_POST["create"];

    if(isset($login)){
        echo "login";   
    }

    else if(isset($create)){
        $hashPassword = password_hash($input_password, PASSWORD_DEFAULT);
        echo hashPassword;
        
        if (!userExists($input_username)){
            createUser($input_username, $hashPassword);
            echo "Create user". $input_username;
        }
        
        else{
            echo $input_username, "is already taken";
        }
    }

    else{
        echo "no action";
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