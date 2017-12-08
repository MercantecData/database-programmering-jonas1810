<?php
    function databaseConnection(){
        $ip= "localhost";
        $user = "root";
        $pass = "";    
        $dbname = "LoginSystem";
        
        $connection = new mysqli($ip, $user, $pass, $dbname);
        
        if($connection->connect_error){
            die("forbindelsen mislykkedes");
        }
        return $connection;
    }
    function databaseClose($conn){
     mysqli_close($conn);
    }
    function runQuery($query)
    {
        $connection = databaseConnection();
        $data = $connection->query($query);
        databaseClose($connection);
        return $data; 
    }
    function createUser($username, $password){
        $query = "INSERT INTO Users(username, password) VALUES('$username','$password')";
        runQuery($query);
    }
    function userExists($username){
        $query = "Select username From Users";
        $db_usernames = runQuery($query);
        $found = false;
        while ($row = $db_usernames->fetch_assoc())
        {
            if ($row["username"]==$username)
            {
                $found = true;
            }
        }
        return $found;
    }
    function validateLogin($username, $password){
        $query = "SELECT id, username, password FROM Users";
        $data = runQuery($query);
        
        while($row = $data->fetch_assoc())
        {
            $db_id = $row["id"];
            $db_usernames = $row["username"];
            $db_password = $row["password"];
        
            if ($username == $db_usernames && password_verify($password, $db_password))
            {
                return $db_id;
            }
        }
        return NULL;
    }
?>