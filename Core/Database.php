<?php
namespace Core;

use PDO;

class Database
{
    private $_connection;
    private $_servername = "localhost";
    private $_username = "root";
    private $_pass = "";

    public function __construct(){

        try {
            $this->_connection = new PDO("mysql:host=$this->_servername;dbname=test", $this->_username, $this->_pass);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }    
    public function getConnection(){
		return $this->_connection;
	}
}

