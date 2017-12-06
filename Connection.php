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
        $connection = $databaseConnection();
        $data = $connection->query($query);
        databaseClose($connection);
        return $data; 
    }
    function createUser($username, $password){
        $query = "INSERT INTO users(username, password) VALUES('$username','$password')";
        runQuery($query);
        
    }
    function userExists($username){
        $query = "Select username From users";
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
    function validLogin($username, $password){
        $query = "SELECT username, password FROM users";
        $data = runQuery($query);
        echo $data;
        
    }

?>