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
   
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4" id="colorida" >MENU PRINCIPAL</h1>
                <div class="mb-3">
                    <a href="formAgendamento.php" class="linksindex" id="agendamentoindex">Formulário de Agendamento</a> <br>
                </div>
                <div class="mb-3">
                    <a href="formPagamento.php" class="linksindex" id="pagamentoindex">Formulário de Pagamento</a> <br>
                </div>

                <div class="mb-3">
                    <a href="formUsuario.php" class="linksindex" id="usuarioindex">Formulário de Usuário</a> <br>
                </div>

                <div class="mb-3">
                    <a href="listarAgendamentos.php" class="linksindex" id="agendamentoindex2">Listar Agendamentos</a> <br>
                </div>

                <div class="mb-3">
                    <a href="listarPagamentos.php" class="linksindex" id="pagamentoindex2">Listar Pagamentos</a> <br>
                </div>

                <div class="mb-3">
                    <a href="listarServicos.php" class="linksindex" id="servicosindex2">Listar Serviços</a> <br>
                </div>

                <div class="mb-3">
                    <a href="listarUsuarios.php" class="linksindex" id="usuarioindex">Listar Usuários</a> <br>
                </div>

                <div class="mb-3">
                    <a href="sucesso.html" class="linksindex" id="sucessoindex">Página de Sucesso</a> <br>
                </div>

                <div class="mb-3">
                    <a href="rodape.html" class="linksindex" id="rodapeindex">Rodapé</a> <br>
                </div>

                <div class="mb-3">
                    <a href="servicos.php" class="linksindex" id="servicosindex">Selecionar Serviço</a> <br>
                </div>

               <div class="mb-3">
                    <a href="formBusca.php" class="linksindex" id="servicosindex">Pesquisar</a> <br>
                </div> 

               <div class="mb-3">
                    <a href="realizarPagamento.php" class="linksindex" id="servicosindex">realizarPagamento</a> <br>
                </div> 

            </div>
            
        </div>
    </div>

</body>
</html>
