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
    </form>
</body>
</html>
