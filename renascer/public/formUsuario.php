<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$tipos = listarUsuario($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde">
    <h1 class="letra-dourada">Ateliê Renascer</h1>

  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h1 class="card-title text-center mb-4">Criar conta</h1>

        <form action="salvarUsuario.php" method="POST">
          
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>

          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>

        <div class="mb-3">
        <label class="form-label">Tipo</label><br>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipo" id="tipo_f" value="f" required>
            <label class="form-check-label" for="tipo_f">Funcionário</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipo" id="tipo_g" value="g">
            <label class="form-check-label" for="tipo_g">Gerente</label>
        </div>
        </div>

        <button type="submit" class="btn btn-dark w-100">Criar</button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
