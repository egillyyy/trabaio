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
    </form>
</body>
</html>
