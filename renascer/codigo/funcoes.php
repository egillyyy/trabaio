<?php
// Cadastro de Usuario
function salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone) {
    $sql = "INSERT INTO tb_usuario (email, senha, tipo, nome, telefone) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($comando, 'sssss', $email, $senha_hash, $tipo, $nome, $telefone);
    
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


// Deletar de Usuario
function deletarUsuario($conexao, $idusuario) {
    $sql = "DELETE FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Pesquisa de usuario pelo ID
function pesquisarUsuarioId($conexao, $idusuario) { 
    $sql = "SELECT * FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $usuario;
};

// Editar de usuario
function editarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone, $idusuario) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE tb_usuario SET email=?, senha=?, tipo=?, nome=?, telefone=? WHERE idusuario=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssssi', $email, $senha_hash, $tipo, $nome, $telefone, $idusuario);
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

// Listar serviço
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
function deletarServico($conexao, $idservico) {
    $sql = "DELETE FROM tb_servico WHERE idservico = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idservico);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

//  Pesquisa de serviço pelo ID
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

// Editar de serviços
function editarServico($conexao, $preco_servico, $tipo_servico, $idservico) {
    $sql = "UPDATE tb_servico SET preco_servico=?, tipo_servico=? WHERE idservico=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $preco_servico, $tipo_servico, $idservico);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

// Cadastro de Agendamento
function salvarAgendamento ($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario) {
    $sql = "INSERT INTO tb_agendamento (data, horario, tb_servico_id_servico, tb_usuario_idusuario_cliente, tb_usuario_idusuario_funcionario) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssiii', $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

// Listagem de Agendamento
function listarAgendamento($conexao) {
    $sql = "SELECT * FROM tb_agendamento";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_agendamento = [];
    while ($agendamento = mysqli_fetch_assoc($resultados)) {
        $lista_agendamento[] = $agendamento;
    }
    mysqli_stmt_close($comando);

    return $lista_agendamento;
};

// Pesquisa de usuario pelo ID
function pesquisarAgebdamentoId($conexao, $idagendamento) { 
    $sql = "SELECT * FROM tb_agendamento WHERE idagendamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idagendamento);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $usuario;
};

// Deletar Agendamento
function deletarAgendamento($conexao, $idagendamento) {
    $sql = "DELETE FROM tb_agendamento WHERE idagendamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idagendamento);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Editar de Agendamento
function editarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario, $idagendamento) {
    $sql = "UPDATE tb_agendamento SET data=?, horario=?, tb_servico_id_servico=?, tb_usuario_idusuario_cliente=?, tb_usuario_idusuario_funcionario=? WHERE idagendamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssiiii', $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario, $idagendamento);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

// Cadastrar taxa
function salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento) {
    $sql = "INSERT INTO tb_taxa (status, taxa, tb_agendamento_idagendamento) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssi', $status, $taxa, $tb_agendamento_idagendamento);
    
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

// Deletar taxa
function deletarTaxa($conexao, $idtaxa) {
    $sql = "DELETE FROM tb_taxa WHERE idtaxa = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idtaxa);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Editar taxa
function editarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento, $idtaxa) {
    $sql = "UPDATE tb_taxa SET status=?, taxa=?, tb_agendamento_idagendamento=? WHERE idtaxa=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssii', $status, $taxa, $tb_agendamento_idagendamento, $idtaxa);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

// Cadastrar Pagamento
function salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento) {
    $sql = "INSERT INTO tb_pagamento (valor, forma, descricao, tb_agendamento_idagendamento) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $valor, $forma, $descricao, $tb_agendamento_idagendamento);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

// Listar Pagamento
function listarPagamento($conexao) {
    $sql = "SELECT * FROM tb_pagamento";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_pagamento = [];
    while ($pagamento = mysqli_fetch_assoc($resultados)) {
        $lista_pagamento[] = $pagamento;
    }
    mysqli_stmt_close($comando);

    return $lista_pagamento;
};

// Deletar Pagamento
function deletarPagamento($conexao, $idpagamento) {
    $sql = "DELETE FROM tb_pagamento WHERE idpagamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpagamento);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

// Editar Pagamento
function editarPagamento ($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento) {
    $sql = "UPDATE tb_pagamento SET valor=?,forma=?, descricao=?, tb_agendamento_idagendamento=? WHERE idpagamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sssi', $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};