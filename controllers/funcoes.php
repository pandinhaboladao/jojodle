<?php
    require_once "../models/consultas.php"; // Inclui o arquivo de consultas

    class Funcoes{
        private $consultas;

        public function __construct() {
            $this->consultas = new Consultas();
        }

        public function sorteio() {
            if (!isset($_SESSION["stand_alvo"])) {
                $stand_alvo = $this->consultas->consultaSorteio();
                if ($stand_alvo) {
                    $_SESSION["stand_alvo"] = $stand_alvo;
                }
            }
        }

        public function guess() {
            if ($_POST) {
                $guess = $_POST["stand_guess"];
                $_SESSION["guess"] = $guess;
                $stand_alvo = $_SESSION["stand_alvo"];
                $stand = $this->consultas->consultaGuess($guess);
    
                if ($stand) {
                    if ($guess === $stand_alvo["nome"]) {
                        $msg = "<h3>Acertou!</h3>";
                        $_SESSION["erros"][] = $guess;
                    } else {
                        $msg = "<h3>Errou! Tente novamente.</h3>";
                        if (!isset($_SESSION["erros"])) {
                            $_SESSION["erros"] = [];
                        }
    
                        if (!in_array($guess, $_SESSION["erros"])) {
                            $_SESSION["erros"][] = $guess;
                        }
                    }
                } else {
                    if ($stand) {
                        if ($guess === $stand_alvo["nome"]) {
                            $msg = "Acertou!";
                            $_SESSION["erros"][] = $guess;
                        } else {
                            $msg = "Errou! Tente novamente.";
                            if (!isset($_SESSION["erros"])) {
                                $_SESSION["erros"] = [];
                            }
        
                            if (!in_array($guess, $_SESSION["erros"])) {
                                $_SESSION["erros"][] = $guess;
                            }
                        }
                    } else {
                        $msg = "Stand não encontrado! Tente novamente.";
                    }
                }
    
                header("Location: ../views/jogo.php?message=" . $msg);
                exit();
            }
        }

        public function dica(){
            if (isset($_SESSION["erros"]) && count($_SESSION["erros"]) > 0) {
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Stand</th>
                                <th>Parte</th>
                                <th>Habilidade</th>
                                <th>Forma</th>
                                <th>Especial</th>
                                <th>Poder</th>
                                <th>Velocidade</th>
                                <th>Alcance</th>
                                <th>Resistência</th>
                                <th>Precisão</th>
                                <th>Potencial</th>
                            </tr>
                        </thead>
                        <tbody>";
        
                foreach ($_SESSION["erros"] as $erro) {
                    $row = $this->consultas->consultaDica($erro);
        
                    if ($row) {
                        echo "<tr>";
                        // Adiciona o nome como tooltip (title) da imagem
                        echo "
                        <td class='tooltip-container'>
                            <img src='" . htmlspecialchars($row["imagem"]) . "' alt='Ícone de " . htmlspecialchars($row["nome"]) . ";'>
                            <span class='tooltip-text'>" . htmlspecialchars($row["nome"]) . "</span>
                        </td>";
        
                        // Acessa o stand alvo
                        $stand_alvo = $_SESSION["stand_alvo"];
        
                        // Atributos que precisam de comparação
                        $atributos = ['parte', 'habilidade', 'forma', 'especial', 'poder', 'velocidade', 'alcance', 'resistencia', 'precisao', 'potencial'];
        
                        foreach ($atributos as $atributo) {
                            $classe = 'incorreto'; // Padrão
        
                            if (in_array($atributo, ['habilidade', 'forma', 'especial'])) {
                                // Comparação detalhada para atributos múltiplos
                                $valores_alvo = explode(',', $stand_alvo[$atributo]);
                                $valores_palpite = explode(',', $row[$atributo]);
                                $intersecao = array_intersect($valores_palpite, $valores_alvo);
        
                                if (count($intersecao) === count($valores_alvo) && count($intersecao) === count($valores_palpite)) {
                                    $classe = 'correto';
                                } else if (count($intersecao) > 0) {
                                    $classe = 'parcial';
                                }
                            } else {
                                // Comparação simples para atributos únicos
                                $classe = ($row[$atributo] === $stand_alvo[$atributo]) ? 'correto' : 'incorreto';
                            }
        
                            echo "<td class='$classe'>" . htmlspecialchars($row[$atributo]) . "</td>";
                        }
        
                        echo "</tr>";
                    }
                }
        
                echo "</tbody></table>";
            }
        }        
    }