<?php
    session_start();

    // Destroi todas as variáveis de sessão
    session_unset();

    // Destroi a sessão completamente
    session_destroy();

    // Redireciona para a página inicial do jogo (index.php)
    header("Location: ../views/jogo.php");
    exit();
