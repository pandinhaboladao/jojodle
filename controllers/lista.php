<?php
    require_once "../models/consultas.php"; // Inclui o arquivo de consultas

    class Lista {
        private $consultas;
        
        //Se conectando com o banco de dados
        public function __construct() {
            $this->consultas = new Consultas();
        }
        

        public function lista() {
            if (isset($_GET["query"])) {
                $query = $_GET["query"] . '%'; //Pegando valor da query/lista com o % para usar o like
                //Pegando a lista de stands que começam com a letra da query
                $stands = $this->consultas->consultaLista($query);
    
                if ($stands) { //Verificando se existe algum stand com essa letra
                    foreach ($stands as $stand) {
                        //Pegando o nome e a imagem do stand
                        $nome = htmlspecialchars($stand["nome"]);
                        $imagem = htmlspecialchars($stand["imagem"]);
    
                        //Mostrando
                        echo "<div class='stand-sugestao' onclick='selecionarStand(\"$nome\")'>";
                        echo "<img src='$imagem' alt='$nome' class='stand-imagem-lista'>"; //Imagem
                        echo "<span class='stand-nome'>$nome</span>"; //Nome
                        echo "</div>";
                    }
                } else {
                    echo "<p>Nenhuma sugestão encontrada</p>";
                }
            } else {
                echo "Nenhuma consulta recebida";
            }
        }
    }
    
    //Chamando a função
    $lista = new Lista();
    $lista->lista();