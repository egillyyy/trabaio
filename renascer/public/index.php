
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logar</title>
</head>
<body>
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
        <h1 class="card-title text-center mb-4">Logar</h1>
        <form action="../codigo/verificarLogin.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>

                <input type="hidden" name="tipo" value="c">

                <a href="criarconta.php" class="btn btn-dark w-100">Criar Conta</a>

                <div class="mb-3">
                    <input type="submit" value="Acessar" class="btn btn-outline-secondary w-100">
                </div>


            </div>

        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    
</body>
</html>