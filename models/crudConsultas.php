<?php
require_once "database.php";

class CrudConsultas {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crudView() {
        $sql = "SELECT * FROM stands";
        $result = $this->conn->query($sql);

        $stands = [];
        while ($row = $result->fetch_assoc()) {
            $stands[] = $row;
        }

        return $stands;
    }

    public function crudEdit($stand_id) {
        $sql = "SELECT * FROM stands WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $stand_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        return $result->fetch_assoc();
    }    

    public function crudCreate($dados) {
        $sql = "INSERT INTO stands (imagem, nome, parte, forma, habilidade, especial, poder, velocidade, alcance, resistencia, precisao, potencial)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssss",
            $dados['imagem'], $dados['nome'], $dados['parte'], $dados['forma'], $dados['habilidade'],
            $dados['especial'], $dados['poder'], $dados['velocidade'], $dados['alcance'],
            $dados['resistencia'], $dados['precisao'], $dados['potencial']
        );
        $stmt->execute();
        $stmt->close();

        return $this->conn->affected_rows > 0;
    }

    public function crudUpdate($stand_id, $dados) {
        $sql = "UPDATE stands SET 
                    imagem = ?, nome = ?, parte = ?, forma = ?, habilidade = ?, especial = ?, 
                    poder = ?, velocidade = ?, alcance = ?, resistencia = ?, precisao = ?, potencial = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssi",
            $dados['imagem'], $dados['nome'], $dados['parte'], $dados['forma'], $dados['habilidade'],
            $dados['especial'], $dados['poder'], $dados['velocidade'], $dados['alcance'],
            $dados['resistencia'], $dados['precisao'], $dados['potencial'], $stand_id
        );
        $stmt->execute();
        $stmt->close();

        return $this->conn->affected_rows > 0;
    }

    public function crudDelete($stand_id) {
        $sql = "DELETE FROM stands WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $stand_id);
        $stmt->execute();
        $stmt->close();

        return $this->conn->affected_rows > 0;
    }
}
