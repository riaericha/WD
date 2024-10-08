<?php 
    class Database{
        protected $connection;

        private $host = "localhost";
        private $username = "root";
        private $database = "mariaschool";
        private $password = '';

        function connect(){
            try{
                $this->connection = new PDO("mysql:host=$this->host; dbname=$this->database;", $this->username, $this->password);
            }catch(PDOException $e){
                echo "Connection Error!" . $e->getMessage();
            }
            return $this->connection;
        }
    }
?>