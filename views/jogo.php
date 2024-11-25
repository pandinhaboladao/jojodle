<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jojodle</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styleJogo.css">
    <script src="lista.js"></script>
</head>
<body>
<br>
<div class="col-4">
    <a href="../index.php" class="btn btn-warning">Voltar ao Início</a>
</div>
<center>
    <div class="blur-overlay"></div>

    <div class="content">

        <img src="pictures/jojodle_logo.png" alt="Jojodle Logo" class="logo-img">
        <br><br>

        <!-- Pegando o stand alvo e a resposta-->
        <?php
            session_start();
            if (isset($_SESSION["stand_alvo"])) {
                $stand_alvo = $_SESSION["stand_alvo"];
                //echo "<p>Resposta: " . htmlspecialchars($stand_alvo["nome"]) . "</p>";
            }
        ?>

        <form action="../controllers/jogoController.php" method="post">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Escreva o nome do stand" name="stand_guess" id="stand_guess" onkeyup="mostrarStands(this.value)">
            </div>
            <div id="lista" class="listaStands"></div> <!-- Exibe a lista de stands -->
            
            <br>
            <button type="submit" class="btn btn-warning">Enviar</button>

            <br><br>

            <table class="table">
                <?php
                    //Mostra a mensagem do acerto ou erro do guess
                    if (isset($_GET['message'])) {
                        echo "<h3>" . $_GET['message'] . "</h3>";
                    }
                
                    //Dicas
                    require_once "../controllers/funcoes.php";
                    $dica = new Funcoes();
                    $dica->dica();
                ?>
            </table>
        </form>

        <br><br>
        <form action="../controllers/reiniciar.php" method="post">
            <button type="submit" class="btn btn-danger">Reiniciar Jogo</button>
        </form>
        <br><br><br><br><br><br>
        
    </div>
</center>
</body>
</html>
