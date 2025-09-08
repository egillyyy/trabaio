<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Pagamento</title>
</head>
<body>
    <form action="salvarPagamento.php?id=<?php echo $id; ?>" method="post">
        Cliente: <br>
        <select name="idcliente">
            <option value="">Selecione</option>
            <?php
                foreach ($usuarios as $usuario) {
                    if ($usuario['tipo'] == "c") {
                        echo "<option value='".$usuario['idusuario']."'>".$usuario['nome']."</option>";
                    }
                }
            ?>
        </select>

        <br><br>

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
