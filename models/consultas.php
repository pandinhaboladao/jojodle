<?php
    require_once "database.php"; // Usando a conexão com db

    class Consultas {
        private $conn;

        //Se conectando com o banco de dados
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        //Retorna um stand aleatório
        public function consultaSorteio() {
            $sql = "SELECT * FROM stands WHERE nome='Star Platinum'";
            $result = $this->conn->query($sql);
            return $result->fetch_assoc();
        }

        //Retorna um stand pelo nome, usado no guess para comparar o palpite do usuário com stands do db
        public function consultaGuess($nome) {
            $sql = "SELECT * FROM stands WHERE nome = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc();
        }

        //Retorna todos os atributos do stand que o usuário palpitou
        public function consultaDica($nome) {
            $sql = "SELECT imagem, nome, parte, habilidade, forma, especial, poder, velocidade, alcance, resistencia, precisao, potencial FROM stands WHERE nome = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_assoc();
        }

        //Retorna todos os stands que começam com uma letra em específico, usada na lista da pesquisa
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
    }