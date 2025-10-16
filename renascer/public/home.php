<?php
    require_once "../codigo/verificarLogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fundo-verde" style="min-height: 100vh;">
   
    
    <div class="indexdiv">
        <h1 class="titulomenu">Menu Principal</h1>
        <div class="linksindexdiv">
            <a href="formAgendamento.php" class="linksindex" id="agendamentoindex">Formulário de Agendamento</a> <br>
            <a href="formPagamento.php" class="linksindex" id="pagamentoindex">Formulário de Pagamento</a> <br>
            <a href="formUsuario.php" class="linksindex" id="usuarioindex">Formulário de Usuário</a> <br>
            <a href="listarAgendamentos.php" class="linksindex" id="agendamentoindex2">Listar Agendamentos</a> <br>
            <a href="listarPagamentos.php" class="linksindex" id="pagamentoindex2">Listar Pagamentos</a> <br>
            <a href="listarServicos.php" class="linksindex" id="serviçosindex2">Listar Serviços</a> <br>
            <a href="listarUsuarios.php" class="linksindex" id="usuarioindex">Listar Usuários</a> <br>
            <a href="sucesso.html" class="linksindex" id="sucessoindex">Página de Sucesso</a> <br>
            <a href="rodape.html" class="linksindex" id="rodapeindex">Rodapé</a> <br>
            <a href="servicos.php" class="linksindex" id="serviçosindex">Selecionar Serviço</a> <br>
        </div>
    </div>

</body>
</html>
