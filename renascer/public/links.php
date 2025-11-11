<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
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
            <?php
                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='buscaAgendamento.php' class='linksindex' id='agendamentoindex2'>Pesquisar Agendamentos</a> <br>";
                    echo "</div>";

                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='formUsuario.php' class='linksindex' id='agendamentoindex2'>Adicionar Usuário</a> <br>";
                    echo "</div>";

                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarAgendamentos.php' class='linksindex' id='agendamentoindex2'>Listar Agendamentos</a> <br>";
                    echo "</div>";
                // }

                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarPagamentos.php' class='linksindex' id='pagamentoindex2'>Listar Pagamentos</a> <br>";
                    echo "</div>";
                // }

                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarServicos.php' class='linksindex' id='servicosindex2'>Listar Serviços</a> <br>";
                    echo "</div>";
                    // }

                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarUsuarios.php' class='linksindex' id='usuarioindex'>Listar Usuários</a> <br>";
                    echo "</div>";
                // }
                
                // if ($tipo == 'f' AND $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='criarServico.php' class='linksindex' id='servicosindex'>Criar Serviço</a> <br>";
                    echo "</div>";
                // }
                
                // else {
                    echo "<div class='mb-3'>";
                    echo "<a href='formAgendamento.php' class='linksindex' id='agendamentoindex'>Formulário de Agendamento</a> <br>";
                    echo "</div>";
                    
                    echo "<div class='mb-3'>";
                    echo "<a href='formPagamento.php' class='linksindex' id='pagamentoindex'>Formulário de Pagamento</a> <br>";
                    echo "</div>";
                    
                    echo "<div class='mb-3'>";
                    echo "<a href='rodape.html' class='linksindex' id='rodapeindex'>Rodapé</a> <br>";
                    echo "</div>";
                    
                    echo "<div class='mb-3'>";
                    echo "<a href='servicos.php' class='linksindex' id='servicosindex'>Selecionar Serviço</a> <br>";
                    echo "</div>";
                    
                    echo "<div class='mb-3'>";
                    echo "<a href='realizarPagamento.php' class='linksindex' id='servicosindex'>Realizar Pagamento</a> <br>";
                    echo "</div>";
                    
                    echo "<div class='mb-3'>";
                    echo "<a href='sucesso.html' class='linksindex' id='sucessoindex'>Página de Sucesso</a> <br>";
                    echo "</div>";
                // }    
            ?>

            <a href="deslogar.php">Sair</a>

            </div>
            
        </div>
    </div>

</body>
</html>
