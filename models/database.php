<?php
    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "jojo";
        public $conn;

        //Função para se conectar com o banco de dados
        public function getConnection(){
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error){
                die("Erro na conexão:". $this->conn->connect_error);
            }
            return $this->conn;
        }
    }