<?php
  session_start();
  require "../../models/crudConsultas.php";

  $consultas = new CrudConsultas();
  $stands = $consultas->crudView();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../CSS/styleView.css">
  </head>
  <body>
    <div class="container mt-4">
    <div class="col-4">
      <a href="../../index.php" class="btn btn-jojo btn-lg me-3">Voltar ao Início</a>
    </div>
    <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Stands
                <a href="createStand.php" class="btn btn-primary float-end">Adicionar Stand</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ícone</th>
                    <th>Nome</th>
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
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (count($stands) > 0) {
                      foreach($stands as $stand) {
                    ?>
                  <tr>
                    <td><?=$stand['id']?></td>
                    <td><img src="<?=$stand['imagem']?>" alt="<?=$stand['nome']?>" style="width: 100px; height: auto;"></td>
                    <td><?=$stand['nome']?></td>
                    <td><?=$stand['parte']?></td>
                    <td><?=$stand['habilidade']?></td>
                    <td><?=$stand['forma']?></td>
                    <td><?=$stand['especial']?></td>
                    <td><?=$stand['poder']?></td>
                    <td><?=$stand['velocidade']?></td>
                    <td><?=$stand['alcance']?></td>
                    <td><?=$stand['resistencia']?></td>
                    <td><?=$stand['precisao']?></td>
                    <td><?=$stand['potencial']?></td>
                    <td>
                      <a href="editStand.php?id=<?=$stand['id']?>" class="btn btn-success btn-sm">
                         <span class="bi-pencil-fill"></span>&nbsp;Editar
                      </a>
                      <form action="../../controllers/crudController.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                type="submit" 
                                name="delete_stand" 
                                value="<?=$stand['id']?>" 
                                class="btn btn-danger btn-sm">
                            <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                 } else {
                   echo '<tr><td colspan="13" class="text-center">Nenhum stand encontrado</td></tr>';
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>