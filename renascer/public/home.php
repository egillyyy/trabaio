<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ateliê Renascer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="fundo-verde">
    <header class="cabecalho">
        <div class="logo">
            <img src="css/logoBranca.png" alt="Logo Ateliê Renascer">
            <h1 class="titulo-home">Ateliê Renascer</h1>
        </div>

        <div class="botoes">
            <?php
                if ($tipo == 'f' or $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='buscaAgendamento.php' class='linkframe' target='conteudoFrame' id='agendamentoindex2'>Pesquisar Agendamentos</a> <br>";
                    echo "</div>";
                }

                if ($tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='formUsuario.php' class='linkframe' target='conteudoFrame' id='agendamentoindex2'>Adicionar Usuário</a> <br>";
                    echo "</div>";
                }

                if ($tipo == 'f' or $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarAgendamentos.php' class='linkframe' target='conteudoFrame' id='agendamentoindex2'>Listar Agendamentos</a> <br>";
                    echo "</div>";
                }

                if ($tipo == 'f' or $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarPagamentos.php' class='linkframe' target='conteudoFrame' id='pagamentoindex2'>Listar Pagamentos</a> <br>";
                    echo "</div>";
                }

                if ($tipo == 'f' or $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarServicos.php' class='linkframe' target='conteudoFrame' id='servicosindex2'>Listar Serviços</a> <br>";
                    echo "</div>";
                    }

                if ($tipo == 'f' or $tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='listarUsuarios.php' class='linkframe' target='conteudoFrame' id='usuarioindex'>Listar Usuários</a> <br>";
                    echo "</div>";
                }
                
                if ($tipo == 'g') {
                    echo "<div class='mb-3'>";
                    echo "<a href='criarServico.php' class='linkframe' target='conteudoFrame' id='servicosindex'>Criar Serviço</a> <br>";
                    echo "</div>";
                }
                
                if ($tipo == 'f' or $tipo == 'g' or $tipo =='c') {
                    echo "<div class='mb-3'>";
                    echo "<a href='formAgendamento.php' class='linkframe' target='conteudoFrame' id='agendamentoindex'>Formulário de Agendamento</a> <br>";
                    echo "</div>";
                }
                // if ($tipo == 'f' or $tipo == 'g') {

                //     echo "<div class='mb-3'>";
                //     echo "<a href='formPagamento.php' class='linkframe' target='conteudoFrame' id='pagamentoindex'>Formulário de Pagamento</a> <br>";
                //     echo "</div>";
                // }  
                if ($tipo == 'f' or $tipo == 'g' or $tipo =='c') {

                    echo "<div class='mb-3'>";
                    echo "<a href='rodape.html' class='linkframe' target='conteudoFrame' id='rodapeindex'>Rodapé</a> <br>";
                    echo "</div>";
                }
                if ($tipo == 'f' or $tipo == 'g' or $tipo =='c') {
                    echo "<div class='mb-3'>";
                    echo "<a href='servicos.php' class='linkframe' target='conteudoFrame' id='servicosindex'>Selecionar Serviço</a> <br>";
                    echo "</div>";
                } 
                if ($tipo == 'f' or $tipo == 'g' or $tipo =='c') {
                    echo "<div class='mb-3'>";
                    echo "<a href='realizarPagamento.php' class='linkframe' target='conteudoFrame' id='servicosindex'>Realizar Pagamento</a> <br>";
                    echo "</div>";
                }
                if ($tipo == 'f' or $tipo == 'g' or $tipo =='c') {
                    echo "<div class='mb-3'>";
                    echo "<a href='sucesso.html' class='linkframe' target='conteudoFrame' id='sucessoindex'>Página de Sucesso</a> <br>";
                    echo "</div>";
                }    
            ?>
        
    </header>
<!-- main significa meioq o conteudo do iframe tlgd? -->
    <main class="conteudo" id="fundo-verde">
        <iframe src="servicos.php" name="conteudoFrame" frameborder="0"></iframe>
    </main>
<footer>
    <?php
    require_once "rodape.php";
    ?>
</footer>  
</body>
</html>
class="linkframe"
target="conteudoFrame"