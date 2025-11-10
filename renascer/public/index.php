<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="funcoes.js"></script>
</head>

<body class="fundo-verde">
  <h1 class="letra-dourada text-center">Ateliê Renascer</h1>

  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h1 class="card-title text-center mb-4" id="fonte">Logar</h1>

        <form action="../codigo/verificarLogin.php" method="POST" onsubmit="return validarLogin()">
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="senha" name="senha">
              <button type="button" class="btn btn-outline-secondary" onclick="mostrarSenha()">👁</button>
            </div>
          </div>

          <input type="hidden" name="tipo" value="c">

          <div id="mensagem" class="text-center mb-3"></div>

          <div class="mb-3">
            <input type="submit" value="Acessar" class="btn btn-outline-secondary w-100">
          </div>

          <a href="criarconta.php" class="btn btn-dark w-100">Criar Conta</a>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
