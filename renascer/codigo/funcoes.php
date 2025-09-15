<?php
/**
 * Cadastra o usuário no Banco de Dados
 * 
 * Salva um usuário caso não tenha
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $email O e-mail informado pelo usuário.
 * @param string $senha A senha informada pelo usuário.
 * @param string $tipo O tipo informado pelo usuário.
 * @param string $nome O nome informada pelo usuário.
 * @param string $telefone O telefone informada pelo usuário.
 * @return int ID do usuário.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
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

/**
 * Cadastra o serviço no Banco de Dados
 * 
 * Salva um serviço caso não tenha
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $preco_servico O preço de serviço informado pelo usuário.
 * @param string $tipo_servico O tipo de serviço informado pelo usuário.
 * @param string $descricao_servico A descrição do serviço informado pelo usuário.
 * @param string $foto A foto informada pelo usuário.
 * @return int ID do serviço.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
function salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto) {
    $sql = "INSERT INTO tb_servico (preco_servico, tipo_servico, descricao_servico, foto) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dsss', $preco_servico, $tipo_servico, $descricao_servico, $foto);
    
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
function editarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto) {
    $sql = "UPDATE tb_servico SET preco_servico=?, tipo_servico=?, descricao_servico=?, foto=? WHERE idservico=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'dsss',$preco_servico, $tipo_servico, $descricao_servico, $foto);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;    
};

/**
 * Cadastra o agendamento no Banco de Dados
 * 
 * Salva um agendamento caso não tenha
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $data A data de agendamento informada pelo usuário.
 * @param string $horario O horário de agendamento informado pelo usuário.
 * @param string $tb_servico_id_servico O serviço vindo da tabela serviço.
 * @param string $tb_usuario_idusuario_cliente O usuário.
 * @param string $tb_usuario_idusuario_funcionario O tipo de funcionário informado pelo usuário.
 * @return int ID do agendamento.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
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
function pesquisarAgendamentoId($conexao, $idagendamento) { 
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

/**
 * Cadastra a taxa no Banco de Dados
 * 
 * Salva uma taxa caso não tenha
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $status O status de taxa informada pelo usuário.
 * @param string $taxa A taxa de taxa informado pelo usuário.
 * @param string $tb_servico_id_servico O serviço vindo da tabela serviço.
 * @param string $tb_agendamento_idagendamento O id do agendamento.
 * @return int ID da taxa.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
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

/**
 * Cadastra o pagamento no Banco de Dados
 * 
 * Salva uma pagamento caso não tenha
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $valor O valor do pagamento informada pelo usuário.
 * @param string $forma A forma de pagamento informada pelo usuário.
 * @param string $descricao A descrição informada pelo usuário.
 * @param string $tb_agendamento_idagendamento O id do agendamento.
 * @return int ID da pagamento.
 * @throws 0 caso não encontre nenhum usuário.
 * 
 **/
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

// Pesquisa de Pagamento pelo ID
function pesquisarPagamentoId($conexao, $idpagamento) { 
    $sql = "SELECT * FROM tb_pagamento WHERE idpagamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpagamento);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $pagamento = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $pagamento;
};

// Editar Pagamento
function editarPagamento ($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento) {
    $sql = "UPDATE tb_pagamento SET valor=?,forma=?, descricao=?, tb_agendamento_idagendamento=? WHERE idpagamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssi', $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};