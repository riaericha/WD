<?php

class Database {
    protected $conn = null;

    function connect() {
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=computer", "root", "");
        }catch(PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
        return $this->conn;
    }
}

?>