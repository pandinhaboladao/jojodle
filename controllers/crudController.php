<?php
    session_start();
    require '../models/crudConsultas.php';

    $crudConsultas = new CrudConsultas();

    // Criar Stand
    if (isset($_POST['create_stand'])) {
        $dados = [
            'imagem' => trim($_POST['imagem']),
            'nome' => trim($_POST['nome']),
            'parte' => trim($_POST['parte']),
            'forma' => trim($_POST['forma']),
            'habilidade' => trim($_POST['habilidade']),
            'especial' => trim($_POST['especial']),
            'poder' => trim($_POST['poder']),
            'velocidade' => trim($_POST['velocidade']),
            'alcance' => trim($_POST['alcance']),
            'resistencia' => trim($_POST['resistencia']),
            'precisao' => trim($_POST['precisao']),
            'potencial' => trim($_POST['potencial']),
        ];

        if ($crudConsultas->crudCreate($dados)) {
            $_SESSION['mensagem'] = 'Stand criado com sucesso';
        } else {
            $_SESSION['mensagem'] = 'Erro ao criar o Stand';
        }
        header('Location: ../views/CRUD/view.php');
        exit;
    }

    // Atualizar Stand
    if (isset($_POST['update_stand'])) {
        $stand_id = $_POST['stand_id'];
        $dados = [
            'imagem' => trim($_POST['imagem']),
            'nome' => trim($_POST['nome']),
            'parte' => trim($_POST['parte']),
            'forma' => trim($_POST['forma']),
            'habilidade' => trim($_POST['habilidade']),
            'especial' => trim($_POST['especial']),
            'poder' => trim($_POST['poder']),
            'velocidade' => trim($_POST['velocidade']),
            'alcance' => trim($_POST['alcance']),
            'resistencia' => trim($_POST['resistencia']),
            'precisao' => trim($_POST['precisao']),
            'potencial' => trim($_POST['potencial']),
        ];

        if ($crudConsultas->crudUpdate($stand_id, $dados)) {
            $_SESSION['mensagem'] = 'Stand atualizado com sucesso';
        } else {
            $_SESSION['mensagem'] = 'Nenhuma alteração foi feita ou erro ao atualizar o Stand';
        }
        header("Location: ../views/CRUD/view.php?id=$stand_id");
        exit;
    }

    // Deletar Stand
    if (isset($_POST['delete_stand'])) {
        // Obtém o ID do stand
        $stand_id = $_POST['delete_stand'];

        // Deleta o stand usando a função
        if ($crudConsultas->crudDelete($stand_id)) {
            $_SESSION['mensagem'] = 'Stand deletado com sucesso';
        } else {
            $_SESSION['mensagem'] = 'Erro ao deletar o Stand';
        }

        // Redireciona para a página de visualização
        header('Location: ../views/CRUD/view.php');
        exit;
    }