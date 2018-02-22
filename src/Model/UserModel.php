<?php

class UserModel
{
    private $_email;
    private $_password;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $pass = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function save($email, $password){
    
        $servername = "localhost";
        $username = "root";
        $pass = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $sql = "INSERT INTO users (email, password) VALUES ('".$email."','". $password ."')";
        var_dump($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    public function login($email, $password){
        $servername = "localhost";
        $username = "root";
        $pass = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sql = "SELECT * FROM users";
        $stmt = $conn->query($sql);
        $row = $stmt->fetchAll();

        var_dump($row);

        for($i = 0; $i < count($row); $i++){
            if($row[$i]['email'] === $email && $row[$i]['password'] === $password){
                return true;
            }
            else {
                return false;
            }
        }


    }
    
}
