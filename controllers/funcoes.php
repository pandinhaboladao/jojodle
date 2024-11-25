<?php
    require_once "../models/consultas.php"; // Inclui o arquivo de consultas

    class Funcoes{
        private $consultas;

        //Se conectando com o banco de dados
        public function __construct() {
            $this->consultas = new Consultas();
        }
        
        //Função do sorteio do stand, para saber qual será o stand alvo a ser descoberto
        public function sorteio() {
            if (!isset($_SESSION["stand_alvo"])) {
                $stand_alvo = $this->consultas->consultaSorteio();

                //Armazenando o stand alvo numa session
                if ($stand_alvo) {
                    $_SESSION["stand_alvo"] = $stand_alvo;
                }
            }
        }

        //Função de verificação do palpite do usuário, para saber se acertou ou não
        public function guess() {
            if ($_POST) {
                $guess = $_POST["stand_guess"];
                $_SESSION["guess"] = $guess; //Armazenando o guess numa session
                $stand_alvo = $_SESSION["stand_alvo"];

                //Comparando o guess com stands existentes
                $stand = $this->consultas->consultaGuess($guess); 
    
                if ($stand) { //Verificando se o stand palpitado realmente existe
                    if ($guess === $stand_alvo["nome"]) { //Acerto
                        $msg = "<h3>Acertou!</h3>";

                        //Armazenando o guess no array de erros para as dicas aparecerem
                        $_SESSION["erros"][] = $guess; ;
                    } else { //Erro
                        $msg = "<h3>Errou! Tente novamente.</h3>";

                        //Iniciando uma lista(array) de erros, para armazenar todos os guesses errados
                        if (!isset($_SESSION["erros"])) {
                            $_SESSION["erros"] = [];
                        }
                        
                        //Colocando os guesses nos erros, evitando colocar duas vezes o mesmo guess
                        if (!in_array($guess, $_SESSION["erros"])) {
                            $_SESSION["erros"][] = $guess;
                        }
                    }
                } else {
                    $msg = "Stand não encontrado! Tente novamente.";
                }
                
                //Envia o usuário de volta para a tela do jogo com a mensagem de se acertou ou não
                header("Location: ../views/jogo.php?message=" . $msg);
                exit();
            }
        }
        
        //Função que mostrará a tabela das dicas, com todos os atributos do stand enviado
        public function dica(){
            //A tabela só irá ser mostrada se um palpite errado foi enviado
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
                
                //Roda por todos os guesses errados
                foreach ($_SESSION["erros"] as $erro) {
                    //Pegando os dados dos atributos do stand
                    $row = $this->consultas->consultaDica($erro);
                    
                    if ($row) {
                        echo "<tr>";
                        //Colocando a imagem e o nome do stand na tabela
                        //Aplicando um tooltip para o nome do stand aparecer ao passar o mouse por cima de sua imagem
                        echo "
                        <td class='tooltip-container'>
                            <img src='" . htmlspecialchars($row["imagem"]) . "' alt='Ícone de " . htmlspecialchars($row["nome"]) . ";'>
                            <span class='tooltip-text'>" . htmlspecialchars($row["nome"]) . "</span>
                        </td>";
        
                        //Acessando o stand alvo
                        $stand_alvo = $_SESSION["stand_alvo"];
        
                        //Definindo os atributos quer serão colocados na tabela
                        $atributos = ['parte', 'habilidade', 'forma', 'especial', 'poder', 'velocidade', 'alcance', 'resistencia', 'precisao', 'potencial'];
                        
                        //Definindo a cor das dicas com base no acerto ou no erro
                        foreach ($atributos as $atributo) {
                            $classe = 'incorreto';
                            
                            //Para os atributos multivalorados (habilidade, forma e especial), é preciso verificar se tem uma dica parcial
                            if (in_array($atributo, ['habilidade', 'forma', 'especial'])) {
                                //Separando e comparando os atributos e valores do guess e do stand alvo
                                $valores_alvo = explode(',', $stand_alvo[$atributo]);
                                $valores_palpite = explode(',', $row[$atributo]);
                                $intersecao = array_intersect($valores_palpite, $valores_alvo);
                                
                                //Se todos os valores do palpite são iguais aos do alvo, é correto
                                if (count($intersecao) === count($valores_alvo) && count($intersecao) === count($valores_palpite)) {
                                    $classe = 'correto';
                                } else if (count($intersecao) > 0) { //Se pelo menos um valor do palpite não é igual ao do alvo, é parcial
                                    $classe = 'parcial';
                                }
                            } else {
                                //Comparação simples com correto e incorreto
                                $classe = ($row[$atributo] === $stand_alvo[$atributo]) ? 'correto' : 'incorreto';
                            }
                            
                            //Definindo a classe(cor) do atributo
                            echo "<td class='$classe'>" . htmlspecialchars($row[$atributo]) . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</tbody></table>";
            }
        }        
    }