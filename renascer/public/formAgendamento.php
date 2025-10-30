<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$servicos = listarServico($conexao);
$usuarios = listarUsuario($conexao);

// aq verifica se veio um serviço selecionado pela URL, dai ele tiver coisado ele vai aparecer selec ionado no formaagendamento
$id_servico_selecionado = isset($_GET['id_servico']) ? $_GET['id_servico'] : null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Agendamento</title>
</head>

<body class="fundo-verde">
    <h1 class="card-title text-center mb-4" id="tituloagendamento">Agendamento</h1>

    <form action="salvarAgendamento.php" method="post" class="card card-agendamento p-4 shadow">

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>
        <br>  

        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="time" class="form-control" id="horario" name="horario" required>
        </div> <br>

        <div class="mb-3">
            <label for="idservico" class="form-label">Serviço</label>
            <select class="form-select" id="idservico" name="idservico" required>
                <option value="">Selecione</option>
                <?php
                foreach ($servicos as $servico) {
                    $selected = ($servico['idservico'] == $id_servico_selecionado) ? "selected" : "";
                    echo "<option value='" . $servico['idservico'] . "' $selected>" . $servico['tipo_servico'] . " - R$ " . $servico['preco_servico'] . "</option>";
                }
                ?>
            </select>
        </div> <br>

        <div class="mb-3">
            <label for="idcliente" class="form-label w-">Cliente</label>
            <select class="form-select" id="idcliente" name="idcliente" required>
                <option value="">Selecione</option>
                <?php
                foreach ($usuarios as $usuario) {
                    if ($usuario['tipo'] == "c") {
                        echo "<option value='" . $usuario['idusuario'] . "'>" . $usuario['nome'] . "</option>";
                    }
                }
                ?>
            </select>
        </div> <br>

        <button type="submit" class="btn btn w-100" id="teste1l">Salvar Agendamento</button>
    </form>

</body>

</html>