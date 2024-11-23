<?php
    require_once "../models/consultas.php"; // Inclui o arquivo de consultas

    class Lista {
        private $consultas;
    
        public function __construct() {
            $this->consultas = new Consultas();
        }
    
        public function lista() {

            if (isset($_GET["query"])) {
                $query = $_GET["query"] . '%';
                $stands = $this->consultas->consultaLista($query);
    
                if ($stands) {
                    foreach ($stands as $stand) {
                        // Sanitize and prepare variables
                        $nome = htmlspecialchars($stand["nome"]);
                        $imagem = htmlspecialchars($stand["imagem"]); // URL da imagem do stand
    
                        // Renderizando o stand com imagem
                        echo "<div class='stand-sugestao' onclick='selecionarStand(\"$nome\")'>";
                        echo "<img src='$imagem' alt='$nome' class='stand-imagem-lista'>"; // Exibe a imagem
                        echo "<span class='stand-nome'>$nome</span>"; // Exibe o nome
                        echo "</div>";
                    }
                } else {
                    echo "<p>Nenhuma sugestão encontrada</p>";
                }
            } else {
                echo "Nenhuma consulta recebida"; // Verifica se a query foi passada
            }
        }
    }
    
    // Cria uma instância e chama a função
    $lista = new Lista();
    $lista->lista();