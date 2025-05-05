<?php
//  Cadastro de Usuário
function salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone, $cpf) {
    $sql = "INSERT INTO tb_usuario (email, senha, tipo, nome, telefone, cpf) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'ssssss', $email, $senha_hash, $tipo, $nome, $telefone, $cpf);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

// Cadastro de serviços
function salvarServico($conexao, $preco_servico, $tipo_servico) {
    $sql = "INSERT INTO tb_servico (preco_servico, tipo_servico) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ds', $preco_servico, $tipo_servico);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};


// Listar usuario
function listarUsuario($conexao) {
    $sql = "SELECT * FROM tb_usuario";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_usuario = [];
    while ($usuario = mysqli_fetch_assoc($resultados)) {
        $lista_usuario[] = $usuario;
    }
    mysqli_stmt_close($comando);

    return $lista_usuario;
};

// Editar de clientes
function editarCliente($conexao, $telefone, $idcliente) {
    $sql = "UPDATE tb_cliente SET telefone=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $telefone, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

// Deletar de clientes
function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Pesquisa de clientes pelo ID
function pesquisarClienteId($conexao, $idcliente) {};

//  Pesquisa de serviço pelo ID
function pesquisarServicoId($conexao, $id_servico) {};

// Editar de serviços
function editarServico($conexao, $preco_servico, $tipo_servico, $id_servico) {
    $sql = "UPDATE tb_servico SET preco_servico=?, tipo_servico=? WHERE id_servico=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $preco_servico, $tipo_servico, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

// Listar serviços
function listarServico($conexao) {
    $sql = "SELECT * FROM tb_servico";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_servicos = [];
    while ($servico = mysqli_fetch_assoc($resultados)) {
        $lista_servicos[] = $servico;
    }
    mysqli_stmt_close($comando);

    return $lista_servicos;
};

// Deletar de serviços
function deletarServico($conexao, $id_servico) {
    $sql = "DELETE FROM tb_servico WHERE id_servico = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $id_servico);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Cadastro de Agendamento
function salvarAgendamento ($conexao, $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico) {
    $sql = "INSERT INTO tb_agendamento (data, horario, tb_cliente_idcliente, tb_taxa_idtaxa, tb_servico_id_servico) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dsiii', $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

// Listagem de Agendamento
function listarAgendamento($conexao) {};

// Editar de Agendamento
function editarAgendamento($conexao, $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico, $idagendamento) {
    $sql = "UPDATE tb_agendamento SET data=?, horario=?, tb_cliente_idcliente=?, tb_taxa_idtaxa=?, tb_servico_id_servico=? WHERE idagendamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dsiii', $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

// Excluir Agendamento
function excluirAgendamento($conexao, $idagendamento) {
    $sql = "DELETE FROM tb_agendamento WHERE idagendamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idagendamento);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Cadastrar funcionário
function salvarFuncionario($conexao, $cpf) {
    $sql = "INSERT INTO tb_funcionario (cpf) VALUES (?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 's', $cpf);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

// Deletar funcionário
function excluirFuncionario ($conexao, $idfuncionario) {
    $sql = "DELETE FROM tb_funcionario WHERE idfuncionario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idfuncionario);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Listar funcionários
function listarFuncionario($conexao){};

// Editar funcionário 
function editarFuncionario($conexao, $cpf, $idfuncionario) {
    $sql = "UPDATE tb_funcionario SET cpf=? WHERE idfuncionario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'si', $cpf, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

// Listar taxas
function listarTaxa($conexao) {
    $sql = "SELECT * FROM tb_taxa";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_taxas = [];
    while ($taxa = mysqli_fetch_assoc($resultados)) {
        $lista_taxas[] = $taxa;
    }
    mysqli_stmt_close($comando);

    return $lista_taxas;
};

// Editar taxa
function editarTaxa($conexao, $status, $taxa, $idtaxa) {
    $sql = "UPDATE tb_taxa SET status=?, taxa=? WHERE idtaxa=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $status, $taxa, $id);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

// Deletar taxa
function deletarTaxa($conexao, $idtaxa) {
    $sql = "DELETE FROM tb_taxa WHERE idtaxa = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idtaxa);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Cadastrar taxa
function salvarTaxa($conexao, $status, $taxa) {
    $sql = "INSERT INTO tb_taxa (status, taxa) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ss', $status, $taxa);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};