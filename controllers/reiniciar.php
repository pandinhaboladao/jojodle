<?php
    session_start();

    //Destroi todas as variáveis de sessão
    session_unset();

    //Destroi a sessão
    session_destroy();

    //Manda o usuário de volta ao jogo
    header("Location: ../views/jogo.php");
    exit();