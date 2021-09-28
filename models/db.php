<?php
    class DBConnection{
        public $host = 'localhost';
        public $username = 'root';
        public $password = '';
        public $dbname = 'myblog';
        protected $conn;
        public function connect() {
            if(!isset($this->conn)){
                try{
                    $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8",$this->username,$this->password);
                }
                catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            return $this->conn;
        }
    }
?>