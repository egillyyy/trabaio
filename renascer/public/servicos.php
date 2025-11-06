<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serviços</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="fundo-verde">
  <h1 class="text-center my-4" id = "tituloservicos">Nossos Serviços</h1>

  <div class="container">
    <div class="row g-4" id = "tudoserviços">

      <!-- Card Unhas -->
      <div class="col-md-3" id = "divcards-unhas">
        <div class="card h-100">
          <a href="formServico.php?tipo_servico=Unha">
            <img src="../imagens/unhas.jpg" class="card-img-top" alt="Unhas Divas" id = "imagemservico">
            <div class="card-body">
              <h5 class="card-title">Unhas</h5>
              <p class="card-text">Transforme suas unhas com estilo e cuidado profissional.</p>
            </div>
          </a>
        </div>
      </div>

      <!-- Card Cabelos -->
      <div class="col-md-3" id="divcards-cabelos">
        <div class="card h-100">
          <a href="formServico.php?tipo_servico=Cabelo">
            <img src="../imagens/cabelo.jpg" class="card-img-top" alt="Cabelos">
            <div class="card-body">
              <h5 class="card-title">Cabelos</h5>
              <p class="card-text">Cortes, hidratações e colorações para realçar sua beleza.</p>
            </div>
          </a>
        </div>
      </div>

      <!-- Card Maquiagens -->
      <div class="col-md-3" id="divcards-maquiagem">
        <div class="card h-100">
          <a href="formServico.php?tipo_servico=Maquiagem">
            <img src="../imagens/maquiagem.png" class="card-img-top" alt="Maquiagens">
            <div class="card-body">
              <h5 class="card-title">Maquiagens</h5>
              <p class="card-text">Maquiagens para qualquer ocasião — realce seu brilho natural.</p>
            </div>
          </a>
        </div>
      </div>

      <!-- Card Especial -->
      <div class="col-md-3" id="divcards-especial">
        <div class="card h-100">
          <a href="formServico.php?tipo_servico=Especial">
            <img src="../imagens/especial.jpg" class="card-img-top" alt="Especial">
            <div class="card-body">
              <h5 class="card-title">Especial</h5>
              <p class="card-text">Serviços exclusivos para momentos inesquecíveis.</p>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
