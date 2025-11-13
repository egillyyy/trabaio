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

/**
 * Lista todos os usuários cadastrados no Banco de Dados
 * 
 * Retorna uma lista de todos os usuários registrados na tabela `tb_usuario`.
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @return array Lista de usuários, onde cada usuário é representado por um array com as chaves:
 *     - 'idusuario' : ID do usuário.
 *     - 'email' : E-mail do usuário.
 *     - 'senha' : Senha do usuário (geralmente criptografada).
 *     - 'tipo' : Tipo de usuário (ex: "admin", "cliente").
 *     - 'nome' : Nome do usuário.
 *     - 'telefone' : Telefone do usuário.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 */
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

/**
 * Deleta um usuário do Banco de Dados
 * 
 * Remove um usuário da tabela tb_usuario com base no ID fornecido.
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param int $idusuario O ID do usuário a ser deletado.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 */
function deletarUsuario($conexao, $idusuario) {
    $sql = "DELETE FROM tb_usuario WHERE idusuario = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idusuario);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

/**
 * Retorna os dados de um usuário a partir do ID.
 *
 * Retorna nome e tipo do usuário a partir do ID informado.
 *
 * @param mysqli $conexao Conexão com o banco.
 * @param int $idusuario ID de um usuário existente.
 * @return array $usuario['email', 'senha', 'tipo', 'nome', 'telefone']
 * @throws 0 Caso não encontrar o ID informado.
 **/
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

/**
* Retorna os dados de um usuário a partir do nome.
*
* Retorna nome do usuário.
*
* @param mysqli $conexao Conexão com o banco.
* @param int $nome nome de um usuário existente.
* @return array $nome
* @throws 0 Caso não encontrar o nome informado.
**/
function pesquisarUsuarioNome($conexao, $nome){
   $sql = "SELECT * FROM tb_usuario WHERE nome LIKE ?";
   $comando = mysqli_prepare($conexao, $sql);

   $nome = "%" . $nome . "%";
   mysqli_stmt_bind_param($comando, 's', $nome);

   mysqli_stmt_execute($comando);

   $resultados = mysqli_stmt_get_result($comando);

   $listar_usuario = [];
   while ($usuario = mysqli_fetch_assoc($resultados)) {
       $listar_usuario[] = $usuario;
   }
   mysqli_stmt_close($comando);

   return $listar_usuario;
};

/**
 * Edita os dados de um usuário no Banco de Dados
 * 
 * Altera as informações de um usuário na tabela tb_usuario com base no ID fornecido.
 * A senha será atualizada com um novo hash gerado usando password_hash.
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param string $email O novo e-mail do usuário.
 * @param string $senha A nova senha do usuário.
 * @param string $tipo O novo tipo de usuário (ex: "f", "c").
 * @param string $nome O novo nome do usuário.
 * @param string $telefone O novo telefone do usuário.
 * @param int $idusuario O ID do usuário a ser atualizado.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 */
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

/**
 * Lista todos os serviços cadastrados no Banco de Dados
 * 
 * Retorna uma lista de todos os serviços registrados na tabela tb_servico.
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @return array Lista de serviços, onde cada serviço é representado por um array com as chaves:
 *     - 'idservico' : ID do serviço.
 *     - 'preco_servico' : Preço do serviço.
 *     - 'tipo_servico' : Tipo do serviço (por exemplo, "consultoria", "manutenção", etc.).
 *     - 'descricao_servico' : Descrição do serviço.
 *     - 'foto' : URL ou caminho da foto do serviço.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 */
function listarServico($conexao, $tipo_servico = "") {
    if ($tipo_servico == "") {
        $sql = "SELECT * FROM tb_servico";
        $comando = mysqli_prepare($conexao, $sql);
    }
    else {
        $sql = "SELECT * FROM tb_servico WHERE tipo_servico = ?";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, 's', $tipo_servico);
    }

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_servicos = [];
    while ($servico = mysqli_fetch_assoc($resultados)) {
        $lista_servicos[] = $servico;
    }
    mysqli_stmt_close($comando);

    return $lista_servicos;
};

/**
 * Deleta um serviço do Banco de Dados
 * 
 * Remove um serviço da tabela tb_servico com base no ID fornecido.
 * 
 * @param mysqli $conexao Uma conexão com o banco.
 * @param int $idservico O ID do serviço a ser deletado.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 */
function deletarServico($conexao, $idservico) {
    $sql = "DELETE FROM tb_servico WHERE idservico = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idservico);

    try {
        mysqli_stmt_execute($comando);
        $retorno = true;
    }
    catch (Exception $e) {
        $retorno = false;
    }
    mysqli_stmt_close($comando);

    return $retorno;
};

/**
 * Retorna os dados de um serviço a partir do ID.
 *
 * Retorna as informações completas de um serviço com base no ID informado.
 *
 * @param mysqli $conexao Conexão com o banco.
 * @param int $idservico ID de um serviço existente.
 * @return array $servico['preco_servico', 'tipo_servico', 'descricao_servico', 'foto']
 * @throws 0 Caso não encontrar o ID informado.
 **/
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

/**
 * Atualiza os dados de um serviço no Banco de Dados
 *
 * Altera as informações de um serviço na tabela `tb_servico` com base no ID fornecido.
 * Os campos atualizados incluem o preço, tipo, descrição e foto do serviço.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param float $preco_servico Novo preço do serviço.
 * @param string $tipo_servico Novo tipo do serviço.
 * @param string $descricao_servico Nova descrição do serviço.
 * @param string $foto Nova URL ou caminho da foto do serviço.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
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
 * @param int $tb_servico_id_servico O serviço vindo da tabela serviço.
 * @param int $tb_usuario_idusuario O usuário cliente.
 * @return bool true em caso de sucesso, false em caso de falha.
 **/
function salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario) {
    $sql = "INSERT INTO tb_agendamento (data, horario, tb_servico_id_servico, tb_usuario_idusuario) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssii', $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario);
    
    mysqli_stmt_execute($comando);
    $idagendamento = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);
    
    return $idagendamento;
};

/**
 * Lista todos os agendamentos cadastrados no Banco de Dados
 *
 * Retorna uma lista de todos os agendamentos registrados na tabela tb_agendamento.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @return array Lista de agendamentos.
 **/
function listarAgendamento($conexao) {
    $sql = "SELECT 
                a.idagendamento,
                a.data,
                a.horario,
                s.tipo_servico AS nome_servico,
                u.nome AS nome_cliente
            FROM tb_agendamento a
            JOIN tb_servico s ON a.tb_servico_id_servico = s.idservico
            JOIN tb_usuario u ON a.tb_usuario_idusuario = u.idusuario";
    
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_agendamento = [];
    while ($agendamento = mysqli_fetch_assoc($resultados)) {
        $lista_agendamento[] = $agendamento;
    }
    mysqli_stmt_close($comando);

    return $lista_agendamento;
}

/**
 * Retorna os dados de um agendamento a partir do ID.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $idagendamento ID de um agendamento existente.
 * @return array|null Dados do agendamento ou null caso não encontre.
 **/
function pesquisarAgendamentoId($conexao, $idagendamento) { 
    $sql = "SELECT * FROM tb_agendamento WHERE idagendamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idagendamento);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $agendamento = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $agendamento;
};

/**
 * Pesquisa todos os agendamentos cadastrados no Banco de Dados
 *
 * Retorna uma Pesquisa de todos os agendamentos e dados dos clientes registrados.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @return array Pesquisa de agendamentos com os dados dos clientes.
 **/
function pesquisarAgendamentosPorNome($conexao, $nome) {
    $sql = "SELECT 
                u.nome,
                a.data,
                a.horario,
                s.tipo_servico AS servico
            FROM tb_agendamento a
            JOIN tb_usuario u ON a.tb_usuario_idusuario = u.idusuario
            JOIN tb_servico s ON a.tb_servico_id_servico = s.idservico
            WHERE u.nome LIKE ?";
    
    $comando = mysqli_prepare($conexao, $sql);
    $pesquisaNome = "%" . $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $pesquisaNome);
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $agendamentos = [];
    while ($linha = mysqli_fetch_assoc($resultados)) {
        $agendamentos[] = $linha;
    }

    mysqli_stmt_close($comando);

    return $agendamentos;
}

/**
 * Deleta um agendamento do Banco de Dados
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $idagendamento ID do agendamento a ser deletado.
 * @return bool true em caso de sucesso, false em caso de falha.
 **/
function deletarAgendamento($conexao, $idagendamento) {
    $sql = "DELETE FROM tb_agendamento WHERE idagendamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idagendamento);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

/**
 * Atualiza os dados de um agendamento no Banco de Dados
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $data Nova data do agendamento.
 * @param string $horario Novo horário do agendamento.
 * @param int $tb_servico_id_servico Novo ID do serviço agendado.
 * @param int $tb_usuario_idusuario Novo ID do cliente associado ao agendamento.
 * @param int $idagendamento ID do agendamento a ser atualizado.
 * @return bool true em caso de sucesso, false em caso de falha.
 **/
function editarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario, $idagendamento) {
    $sql = "UPDATE tb_agendamento SET data=?, horario=?, tb_servico_id_servico=?, tb_usuario_idusuario=? WHERE idagendamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssiii', $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario, $idagendamento);
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

/**
 * Lista todas as taxas cadastradas no Banco de Dados
 *
 * Retorna uma lista de todas as taxas registradas na tabela tb_taxa.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @return array Lista de taxas, onde cada taxa é representada por um array com as chaves:
 *     - 'idtaxa' : ID da taxa.
 *     - 'status' : Status da taxa (ex: "ativa", "inativa").
 *     - 'taxa' : Valor da taxa aplicada.
 *     - 'tb_agendamento_idagendamento' : ID do agendamento relacionado à taxa.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
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

/**
 * Deleta uma taxa cadastrada no Banco de Dados.
 *
 * Remove da tabela tb_taxa o registro correspondente ao ID informado.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $idtaxa ID da taxa que será excluída.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
function deletarTaxa($conexao, $idtaxa) {
    $sql = "DELETE FROM tb_taxa WHERE idtaxa = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idtaxa);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

/**
 * Edita os dados de uma taxa cadastrada no Banco de Dados.
 *
 * Altera as informações de uma taxa na tabela tb_taxa com base no ID fornecido.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string $status Novo status da taxa (ex: "ativa", "inativa").
 * @param string|float $taxa Novo valor da taxa aplicada.
 * @param int $tb_agendamento_idagendamento ID do agendamento relacionado à taxa.
 * @param int $idtaxa ID da taxa que será atualizada.
 * @return bool Retorna true se a atualização for bem-sucedida, ou false em caso de falha.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
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

/**
 * Lista todos os pagamentos cadastrados no Banco de Dados
 *
 * Retorna uma lista de todos os pagamentos registrados na tabela tb_pagamento.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @return array Lista de pagamentos, onde cada pagamento é representado por um array com as chaves:
 *     - 'idpagamento' : ID do pagamento.
 *     - 'valor' : Valor do pagamento realizado.
 *     - 'forma' : Forma utilizada para o pagamento (ex: "cartão", "boleto", "pix").
 *     - 'descricao' : Descrição ou observação sobre o pagamento.
 *     - 'tb_agendamento_idagendamento' : ID do agendamento relacionado ao pagamento.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
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

/**
 * Deleta um pagamento cadastrado no Banco de Dados
 *
 * Remove da tabela tb_pagamento o registro correspondente ao ID informado.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $idpagamento ID do pagamento que será excluído.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
function deletarPagamento($conexao, $idpagamento) {
    $sql = "DELETE FROM tb_pagamento WHERE idpagamento = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idpagamento);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};

/**
 * Pesquisa um pagamento específico no Banco de Dados pelo seu ID
 *
 * Retorna os dados de um pagamento registrado na tabela tb_pagamento com base no ID informado.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param int $idpagamento ID do pagamento que será pesquisado.
 * @return array|null Retorna um array associativo com as chaves:
 *     - 'idpagamento' : ID do pagamento.
 *     - 'valor' : Valor do pagamento realizado.
 *     - 'forma' : Forma utilizada para o pagamento (ex: "cartão", "boleto", "pix").
 *     - 'descricao' : Descrição ou observação sobre o pagamento.
 *     - 'tb_agendamento_idagendamento' : ID do agendamento relacionado ao pagamento.
 *     Retorna null caso não seja encontrado nenhum registro.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
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

/**
 * Edita os dados de um pagamento cadastrado no Banco de Dados
 *
 * Atualiza os campos 'valor', 'forma', 'descricao' e 'tb_agendamento_idagendamento'
 * de um registro na tabela tb_pagamento com base no ID informado.
 *
 * @param mysqli $conexao Conexão com o banco de dados.
 * @param string|float $valor Novo valor do pagamento.
 * @param string $forma Nova forma de pagamento (ex: "cartão", "boleto", "pix").
 * @param string $descricao Nova descrição ou observação sobre o pagamento.
 * @param int $tb_agendamento_idagendamento ID do agendamento relacionado ao pagamento.
 * @param int $idpagamento ID do pagamento que será atualizado.
 * @throws Exception Caso ocorra algum erro na execução da consulta SQL.
 **/
function editarPagamento ($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento) {
    $sql = "UPDATE tb_pagamento SET valor=?,forma=?, descricao=?, tb_agendamento_idagendamento=? WHERE idpagamento=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssi', $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento);
    $funcionou = mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);
    return $funcionou;
};

