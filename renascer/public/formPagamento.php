<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$usuarios = listarUsuario($conexao);
$idagendamento = $_GET['idagendamento'] ?? null; // pega o id do agendamento pela URL
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde">
    <h1 class="card-title text-center mb-4" id="titulopagamento">Pagamento</h1>


    <form action="salvarPagamento.php" method="post" class="card card-agendamento p-4 shadow">

        <input type="hidden" name="idagendamento" value="<?= $_POST['idagendamento'] ?? $_GET['id'] ?? '' ?>">

        <div class="mb-3">
            <label for="idusuario" class="form-label">Cliente</label>
            <select class="form-select" id="idusuario" name="idusuario" required>
                <option value="">Selecione</option>
                <?php
                foreach ($usuarios as $usuario) {
                    if ($usuario['tipo'] == "c") {
                        echo "<option value='".$usuario['idusuario']."'>".$usuario['nome']."</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" required>
        </div>

        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select class="form-select" id="forma_pagamento" name="forma_pagamento" required>
                <option value="">Selecione</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="cartao">Cartão</option>
                <option value="pix">Pix</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Escreva algo sobre o pagamento..."></textarea>
        </div>

        <button type="submit" class="btn btn-dark w-100">Fazer Pagamento</button>
    </form>

</body>
</html>
