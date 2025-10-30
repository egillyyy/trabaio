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

    $id = $_GET['id'];
    $preco_servico = $_POST['preco_servico'];
    $tipo_servico = $_POST['tipo_servico'];
    $descricao_servico = $_POST['descricao_servico'];

    $nome_arquivo = $_FILES['foto']['name'];
    $caminho_temporario = $_FILES['foto']['tmp_name'];

    //pega a extensão do arquivo
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    //gerar um novo nome para o arquivo
    $novo_nome = uniqid() . "." . $extensao;

    //criar um novo caminho para o arquivo
    // lembre-se de criar a pasta e ajustar as permissões
    $caminho_destino = "fotos_servico/" . $novo_nome;

    // move a foto para o servidor
    move_uploaded_file($caminho_temporario, $caminho_destino);

    if ($id == 0) {
        salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $novo_nome);    
    } else {
        editarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $id);    
    }

    header("Location: listarServico.php");

// Pega o serviço selecionado pelo usuário
    $idservico = $_GET['idservico'];

// Busca o serviço no banco 
    $servico = pesquisarServicoId($conexao, $idservico);

    if ($servico) {
        $preco_servico = $servico['preco_servico'];
        $tipo_servico  = $servico['tipo_servico'];

    // Salva o serviço novamente no banco 
        $funcionou = salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

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
