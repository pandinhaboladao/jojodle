<?php
    require_once "database.php"; // Usando a conexão com db

    class Consultas {
        private $conn;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        // Retorna um stand pelo nome
        public function consultaGuess($nome) {
            $sql = "SELECT * FROM stands WHERE nome = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc(); // Retorna o primeiro resultado encontrado
        }

        // Retorna todos os stands que correspondem a uma query
        public function consultaLista($query) {
            $sql = "SELECT nome, imagem FROM stands WHERE nome LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $query);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $stands = [];
            while ($row = $result->fetch_assoc()) {
                $stands[] = $row;
            }
            $stmt->close();
            return $stands;
        }

        // Retorna atributos de um stand para dicas
        public function consultaDica($nome) {
            $sql = "SELECT imagem, nome, parte, habilidade, forma, especial, poder, velocidade, alcance, resistencia, precisao, potencial FROM stands WHERE nome = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc(); // Retorna o primeiro resultado encontrado
        }

        // Retorna um stand aleatório
        public function consultaSorteio() {
            $sql = "SELECT * FROM stands ORDER BY RAND() LIMIT 1";
            $result = $this->conn->query($sql);
            return $result->fetch_assoc(); // Retorna o primeiro resultado encontrado
        }
    }