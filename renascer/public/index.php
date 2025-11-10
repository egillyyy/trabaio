<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="fundo-verde">
  <h1 class="letra-dourada text-center mt-3">Ateliê Renascer</h1>

  <div class="container mt-4">
    <div class="card mx-auto shadow" style="max-width: 400px;">
      <div class="card-body">
        <h1 class="card-title text-center mb-4" id="fonte">Logar</h1>

        <form id="formLogin" action="../codigo/verificarLogin.php" method="POST" novalidate>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@gmail.com" autocomplete="off">
          </div>

          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <div class="input-group">
              <input type="password" class="form-control" id="senha" name="senha" required autocomplete="new-password">
              <span class="input-group-text" id="verSenha" style="cursor:pointer;">👁️</span>
            </div>
          </div>

          <input type="hidden" name="tipo" value="c">

          <div id="mensagem" class="text-danger text-center fw-bold mb-3"></div>

          <div class="mb-3">
            <button type="submit" class="btn btn-outline-secondary w-100">Acessar</button>
          </div>

          <a href="criarconta.php" class="btn btn-dark w-100">Criar Conta</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="funcoes.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
