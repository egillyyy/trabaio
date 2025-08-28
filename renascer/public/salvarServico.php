<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salbar Serviço</title>
</head>
<body>
<?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

// Pega o serviço selecionado pelo usuário
    $idservico = $_GET['idservico'];

// Busca o serviço no banco 
    $servico = pesquisarServicoId($conexao, $idservico);

    if ($servico) {
        $preco_servico = $servico['preco_servico'];
        $tipo_servico  = $servico['tipo_servico'];

    // Salva o serviço novamente no banco 
        $funcionou = salvarServico($conexao, $preco_servico, $tipo_servico);

        if ($funcionou) {
            echo "Serviço $tipo_servico salvo com sucesso";
            echo "<a href='listar_servico.php'>Voltar para lista de serviços</a>";
        } else {
            echo "Erro ao salvar o serviço.";
        }
    } else {
        echo " Serviço não encontrado";
    }

    ?>

    
</body>
</html>
