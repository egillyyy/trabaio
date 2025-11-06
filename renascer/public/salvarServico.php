<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $id = $_GET['id'];
    $preco_servico = $_POST['preco_servico'];
    // $tipo_servico = $_POST['tipo_servico'];
    $descricao_servico = $_POST['descricao_servico'];
    $idservico = $_POST['idservico'];

    $nome_arquivo = $_FILES['foto']['name'];
    $caminho_temporario = $_FILES['foto']['tmp_name'];

    $servico = pesquisarServicoId($conexao, $idservico);
    $tipo_servico = $servico['tipo_servico'];

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

    header("Location: listarServicos.php");
?>
