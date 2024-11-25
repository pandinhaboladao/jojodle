<?php
    session_start();
    require_once "../models/database.php";
    require_once "../controllers/funcoes.php";

    //Preparando o sorteio
    function sorteio() {
        $sorteio = new Funcoes();
        $sorteio->sorteio();
    }

    //Preparando o guess para verificar o palpite
    function guess() {
        $guess = new Funcoes();
        $guess->guess();
    }

    //Chamando apenas se ainda não foi realizado o sorteio
    if (!isset($_SESSION["stand_alvo"])) {
        sorteio();
    }

    //Chamando apenas se foi enviado um formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["stand_guess"])) {
            guess();
        }
    }