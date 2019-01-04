<?php
    class Database {
        //database parameters
        private $host = 'localhost:6969';
        private $db_name = 'php_blog';
        private $username = 'root';
        private $password = '1234';
        private $conn;

        //connect to db
        public function connect(){
            $this->conn = null;

            try {
                //creates a new pdo object with the defined parameters above
                $this->conn = new PDO('mysql:host='.$this->host.';dbname= '.$this->db_name, $this->unername. $this->password);

                //set error mode so we can get exceptions when making queries in case something goes wrong
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){
                //if error, echo the message plus the error
                echo 'Connection Error: ' .$e->getMessage();
            }

            return $this->conn;
        }
    }