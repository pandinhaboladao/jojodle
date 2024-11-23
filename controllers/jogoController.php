<?php
    session_start();

    require_once "../models/database.php"; // Conexão com o DB
    require_once "../controllers/funcoes.php"; // Classe Sorteio

    // Função para lidar com o sorteio
    function sorteio() {
        $sorteio = new Funcoes();
        $sorteio->sorteio(); // Sorteia o stand e o armazena na sessão
    }

    // Função para lidar com o palpite do jogador
    function guess() {
        $guess = new Funcoes();
        $guess->guess(); // Verifica o palpite
    }

    // Se o sorteio ainda não foi feito, realiza o sorteio
    if (!isset($_SESSION["stand_alvo"])) {
        sorteio();
    }

    // Se o formulário for enviado, processa o palpite
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["stand_guess"])) {
            guess();
        }
    }