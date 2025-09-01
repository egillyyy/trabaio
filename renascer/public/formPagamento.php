<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "../codigo/conexao.php";
        require_once "../codigo/funcoes.php";

        $id = $_GET['id'];
        
        $pagamento = salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);
        $valor = $pagamento['valor'];
        $forma = $pagamento['forma'];
        $descricao = $pagamento['descricao'];
        $tb_agendamento_idagendamento = $pagamento['tb_agendamento_idagendamento'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $valor = "";
        $forma = "";
        $descricao = "";
        $tb_agendamento_idagendamento = "";

        $botao = "Cadastrar";
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Pagamento</title>
</head>
<body>
    <form>
        Valor: <br>
        <input type="text" name="valor">
        <br><br>

        Forma: <br>
        <select name="forma_pagamento">
            <option value="dinheiro">Dinheiro</option>
            <option value="cartao">Cartão</option>
            <option value="pix">Pix</option>
        </select>
        <br><br>

        Descrição:<br>
        <textarea name="descricao" placeholder="Escreva sua mensagem aqui..."></textarea>
        <br><br>
        <button type="submit"> <a href="index.php">Fazer pagamento</a></button>


<!-- 
        <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Pagamento</title>
</head>
<body>

    <h1>Cadastrar Pagamento</h1>

    <form action="SalvarPagamento.php" method="post">
        Valor:
        <input type="text" name="valor" required><br><br>

        Forma:
        <input type="text" name="forma" required><br><br>

        Descrição:
        <input type="text" name="descricao"><br><br>

        ID Agendamento: 
        <input type="number" name="idagendamento" required><br><br>

        <input type="submit" value="Salvar">
    </form> -->

</body>
</html>
    </form>
</body>
</html>
