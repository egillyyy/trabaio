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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Usuário</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde">
  <h1 class="letra-dourada text-center mt-3">Ateliê Renascer</h1>

  <div class="container mt-4">
    <div class="card mx-auto shadow" style="max-width: 400px;">
      <div class="card-body">
        <h1 class="tituloConta">Adicionar Usuário</h1>

        <form id="formUsuario" action="salvarUsuario.php" method="POST" novalidate>

          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required autocomplete="off">
          </div>

          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required placeholder="(00) 00000-0000" autocomplete="off">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="off" placeholder="exemplo@gmail.com">
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="senha" name="senha" required autocomplete="new-password">
              <span class="input-group-text" id="verSenha" style="cursor:pointer;">👁️</span>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Tipo de Usuário</label><br>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tipo" id="tipo_f" value="f" required>
              <label class="form-check-label" for="tipo_f">Funcionário</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tipo" id="tipo_g" value="g">
              <label class="form-check-label" for="tipo_g">Gerente</label>
            </div>
          </div>

          <div id="mensagem" class="text-danger mb-3 fw-bold text-center"></div>

          <button type="submit" class="btn btn-dark w-100">Salvar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="funcoes.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
