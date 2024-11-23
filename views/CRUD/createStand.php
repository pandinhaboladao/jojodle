<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Stand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleCreate.css">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Adicionar stand
                <a href="view.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="../../controllers/crudController.php" method="POST">
                <div class="mb-3">
                <div class="mb-3">
                <label>URL da Imagem</label>
                 <input type="text" name="imagem" value="<?=$stand['imagem'] ?? ''?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Parte</label>
                  <input type="text" name="parte" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Habilidade</label>
                  <input type="text" name="habilidade" class="form-control">
                </div>
                <div class="mb-3">
                <label>Forma</label>
                  <input type="text" name="forma" class="form-control">
                </div>
                <div class="mb-3">
                <label>Especial</label>
                  <input type="text" name="especial" class="form-control">
                </div>
                <div class="mb-3">
                <label>Poder</label>
                  <input type="text" name="poder" class="form-control">
                </div>
                <div class="mb-3">
                <label>Velocidade</label>
                  <input type="text" name="velocidade" class="form-control">
                </div>
                <div class="mb-3">
                <label>Alcance</label>
                  <input type="text" name="alcance" class="form-control">
                </div>
                <div class="mb-3">
                <label>Resistência</label>
                  <input type="text" name="resistencia" class="form-control">
                </div>
                <div class="mb-3">
                <label>Precisão</label>
                  <input type="text" name="precisao" class="form-control">
                </div>
                <div class="mb-3">
                <label>Potencial</label>
                  <input type="text" name="potencial" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="create_stand" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>