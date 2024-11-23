<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como jogar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styleComoJogar.css">
    <script src="lista.js"></script>
</head>
<body>
<br>
<div class="col-4">
    <a href="../index.php" class="btn btn-warning">Voltar ao Início</a>
</div>
<br><br>
<center>
    <div class="blur-overlay"></div>

    <div class="content">
        <div class="card-box">
            <section name="intro"> 
                <h2>Como Jogar?</h2>

                <p>
                    O jogo é baseado no anime/mangá JOJO's Bizarre Adventure, onde você precisará advinhar qual o stand correto através das dicas fornecidas.
                </p>
                <p>
                    Basta escrever o nome de um stand e ele revelará as suas propriedades.
                </p>
                <p>
                    A cor dos quadrados mudará para mostrar quão perto o teu palpite estava do stand secreto:
                    <ul>
                        <li><span class="verde">Verde:</span> indica que acertou exatamente a propriedade.</li>
                        <li><span class="amarelo">Amarelo:</span> indica que acertou parcialmente, alguma propriedade certa e outra errada.</li>
                        <li><span class="vermelho">Vermelho:</span> indica que não acertou nenhuma propriedade.</li>
                    </ul>
                </p>
            </section>
            <br><br>
            <section name="propriedade">
                <h2>Propriedades</h2>
                <p>
                    Aqui estão os detalhes das propriedades de cada coluna:
                </p>
                <h3>Parte:</h3>
                <p>
                    A parte em que o stand aparece no anime/mangá. <br>
                    <span class="exemplo">Possíveis valores: </span> 3, 4, 5, ... 
                </p>

                <h3>Habilidade:</h3>
                <p>
                    Tipo de poder que o stand possui, muitas vezes relacionado com o alcance do stand. <br>
                    <span class="exemplo">Possíveis valores: </span> Curto Alcance, Longo Alcance, Automático, ... 
                </p>

                <h3>Forma:</h3>
                <p>
                    É a aparência que o stand possui. <br>
                    <span class="exemplo">Possíveis valores: </span> Humanóide Natural, Numanóide Artificial, Fenômeno, ... 
                </p>

                <h3>Especial:</h3>
                <p>
                    Um atributo de poder especial, também conhecido como tipos incertos. <br>
                    <span class="exemplo">Possíveis valores: </span> Colônia, Evoluído, Compartilhado, ... 
                </p>

                <h3>Poder:</h3>
                <p>
                    Estatística de Poder Destrutivo do stand, que mede a capacidade de causar destruição, físicos ou ao ambiente. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ... 
                </p>

                <h3>Velocidade:</h3>
                <p>
                    Estatística de Velocidade do stand, que mede a agilidade e reflexos. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ... 
                </p>

                <h3>Alcance:</h3>
                <p>
                    Estatística de Alcance do stand, que mede um compromisso da área de manifestação, alcance de influência da habilidade e mobilidade espacial. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ...  
                </p>

                <h3>Resistência:</h3>
                <p>
                    Estatística de Persistência de Poder do stand, que mede a duração de tempo em que pode manter sua habilidade ativa. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ... 
                </p>

                <h3>Precisão:</h3>
                <p>
                    Estatística de Precisão do stand, que mede a precisão e alcance de influência/efeito das habilidades em alvos especificados de um stand. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ... 
                </p>

                <h3>Potencial:</h3>
                <p>
                    Estatística de Potencial de Desenvolvimento do stand, que mede as suas possíveis funções, utilização de habilidades e poderes, e capacidade de melhorar as capacidades gerais. <br>
                    <span class="exemplo">Possíveis valores: </span> A, B, C, ... 
                </p>
            </section>
            <br>
            <p>
                <center>
                    Boa sorte!! <br><br>

                    <a href="jogo.php" class="btn btn-warning">Ir para o jogo</a>
                </center>
            </p>
        </div>
    </div>
</center>
</body>
</html>
