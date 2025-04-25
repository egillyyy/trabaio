<?php
//  Cadastro de Usuário
function salvarUsuario($conexao, $email, $senha, $tipo, $nome) {};

// Cadastro de serviços
function salvarServico($conexao, $preco_servico, $tipo_servico) {};

// Cadastro de cliente
function salvarCliente($conexao, $nome, $cpf, $telefone) {};

// Listagem de clientes
function listarClientes($conexao) {};

// Editar de clientes
function editarCliente($conexao, $telefone, $idcliente) {};

// Deletar de clientes
function deletarCliente($conexao, $idcliente) {};

// Pesquisa de clientes pelo ID
function pesquisarClienteId($conexao, $idcliente) {};

//  Pesquisa de serviço pelo ID
function pesquisarServicoId($conexao, $id_servico) {};

// Editar de serviços
function editarServico($conexao, $preco_servico, $tipo_servico) {};

// Listar serviços
function listarServico($conexao) {};

// Deletar de serviços
function deletarServico($conexao, $id_servico) {};

// Cadastro de Agendamento
function salvarAgendamento ($conexao, $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico) {};

// Listagem de Agendamento
function listarAgendamento($conexao) {};

// Editar de Agendamento
function editarAgendamento($conexao, $data, $horario, $tb_cliente_idcliente, $tb_taxa_idtaxa, $tb_servico_id_servico) {};

// Excluir Agendamento
function excluirAgendamento($conexao, $idagendamento) {};

// Cadastrar funcionário
function salvarFuncionario($conexao, $cpf) {};

// Deletar funcionário
function excluirFuncionario ($conexao, $idfuncionario) {};

// Listar funcionários
function listarFuncionario($conexao){};

// Editar funcionário 
function editarFuncionario($conexao, $cpf) {};

// Listar taxas
function listarTaxa($conexao) {};

// Editar taxa
function editarTaxa($conexao, $status, $taxa) {};

// Deletar taxa
function deletarTaxa($conexao, $status, $taxa) {};

// Cadastrar taxa
function salvarTaxa($conexao, $status, $taxa) {};
