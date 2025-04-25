<?php

function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function salvarCliente($conexao, $nome, $cpf, $telefone) {
    $sql = "INSERT INTO tb_cliente (nome, cpf, telefone) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $cpf, $telefone);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function listarClientes($conexao) {
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_clientes[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_clientes;
}

function editarCliente($conexao, $nome, $cpf, $telefone, $id) {
    $sql = "UPDATE tb_cliente SET nome=?, cpf=?, telefone=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $nome, $cpf, $telefone, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
}
// retornar uma variável com todos os dados do cliente
function pesquisarClienteId($conexao, $idcliente) {
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};

function deletarServico($conexao, $idservico)  {
    $sql = "DELETE FROM tb_servico WHERE idservico = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idservico);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

function listarServico($conexao) {  
    
    $sql = "SELECT * FROM tb_servico";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_servico = [];
    while ($servico = mysqli_fetch_assoc($resultados)) {
        $lista_servico[] = $servico;
    }
    mysqli_stmt_close($comando);

    return $lista_servico;
};

function salvarServico($conexao, $servico, $preco, $horario_disponivel) { 
    $sql = "INSERT INTO tb_servico (servico, preco, horario_disponivel) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sds', $servico, $preco, $horario_disponivel);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

function editarServico($conexao, $servico, $preco, $horario_disponivel) {
    $sql = "UPDATE tb_servico SET servico=?, preco=?, horario_disponivel=? WHERE idservico=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssddddi', $servico, $preco, $horario_disponivel);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;  
};

function pesquisarServicoId($conexao, $idservico) { 
    $sql = "SELECT * FROM tb_servico WHERE idservico = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idservico);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $servico = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $servico;
};

function salvarUsuario($conexao, $senha ,$tipo, $email, $nome) {
    $sql = "INSERT INTO tb_usuario (senha, tipo, email, nome) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssss', $senha_hash, $tipo, $email, $nome);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

function salvarAgendamento() {
   
};

//mostrar o nome do cliente ao invés do id
//mostrar o nome do servico ao invés do id
function listarVendas($conexao) { 
    $sql = "SELECT * FROM tb_venda";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_vendas = [];
    while ($venda = mysqli_fetch_assoc($resultados)) {

        $cliente = pesquisarClienteId($conexao, $venda['idcliente']); 
        $venda['idcliente'] = $cliente['nome']; 

        $servico = pesquisarServicoId($conexao, $venda['idservico']); 
        $venda['idservico'] = $servico['nome']; 

        $lista_vendas[] = $venda;
    }
    mysqli_stmt_close($comando);

    return $lista_vendas;
};

// 1. Faz a função
// 2. Crie um arquivo de teste (pasta tests)
?>