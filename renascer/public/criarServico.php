<?php
require_once "../codigo/verificarLogado.php";
$tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$servicos = listarServico($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $servico = pesquisarServicoId($conexao, $id);
    $preco_servico = $servico['preco_servico'];
    $tipo_servico = $servico['tipo_servico'];
    $descricao_servico = $servico['descricao_servico'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $preco_servico = "";
    $tipo_servico = "";
    $descricao_servico = "";
    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Serviço</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <h1>Cadastro de Serviços</h1>

    <form id="formServico" action="salvarServico.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        Preço do Serviço: <br>
        <input type="text" name="preco_servico" value="<?php echo $preco_servico; ?>"> <br><br>

        <div class="mb-3">
            <label class="form-label">Tipo do Serviço:</label><br>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_servico" id="cabelo" value="Cabelo" required>
                <label class="form-check-label" for="cabelo">Cabelo</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_servico" id="penteado" value="Penteado">
                <label class="form-check-label" for="penteado">Penteado</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_servico" id="maquiagem" value="Maquiagem" required>
                <label class="form-check-label" for="maquiagem">Maquiagem</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_servico" id="unha" value="Unha">
                <label class="form-check-label" for="unha">Unha</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_servico" id="especial" value="Especial">
                <label class="form-check-label" for="especial">Especial</label>
            </div>
        </div>

        Descrição do Serviço: <br>
        <textarea name="descricao_servico" rows="3" placeholder="Escreva algo sobre o serviço..."><?php echo $descricao_servico; ?></textarea> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="funcoes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>