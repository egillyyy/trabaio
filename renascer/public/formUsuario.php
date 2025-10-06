<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta</title>
  <!-- Link do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde">

  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h1 class="card-title text-center mb-4">Criar conta</h1>

        <form action="salvarUsuario.php" method="post">
          
          <!-- Nome -->
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>

          <!-- Telefone -->
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <!-- Senha -->
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>

          <!-- Tipo de usuário -->
          <input type="hidden" name="tipo" value="c">

          <!-- Botão Criar conta -->
          <button type="submit" class="btn btn-dark w-100">Criar conta</button>
        </form>

        <div class="text-center mt-3">
          <a href="index.php" class="btn btn-outline-secondary w-100">Logar</a>
        </div>

      </div>
    </div>
  </div>

  <!-- Script do Bootstrap (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
