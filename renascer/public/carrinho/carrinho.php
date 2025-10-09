<?php
session_start();

require_once "../../codigo/conexao.php";
require_once "../../codigo/funcoes.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
</head>

<body>
    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "carrinho vazio";
    } else {
        $total = 0;
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>id</td>";
        echo "<td>R$ preço servico</td>";
        echo "<td>Tipo serviço</td>";
        echo "<td>Ações</td>";
        echo "</tr>";
        foreach ($_SESSION['carrinho'] as $id => $quantidade) {
            $servico = pesquisarServicoId($conexao, $idservico);

            echo "<tr>";
            echo "<td>" . $servico['tipo'] . "</td>";
            echo "<td>" . $servico['nome'] . "</td>";
            echo "<td> R$ <span class='preco_venda'>" . $servico['preco_venda'] . "</span></td>";

            echo "<td><input type='number' name='quantidade[$id]' class='quantidade' value='$quantidade' data-id='$id' min='1' size='2'</td>";

            $total_unitario = $servico['preco_venda'] * $quantidade;
            $total += $total_unitario;

            echo "<td> R$ <span class='total_unitario'>$total_unitario</span></td>";
            echo "<td><a href='remover.php?id=$id'>[remover]</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<h3>Total da compra: R$ <span id='total'>$total</span></h3>";
    }
    ?>

    <p>
        <a href="index.php">Adicionar servicos</a> <br>
        <a href="gravar.php">Gravar compra</a>
    </p>
    <script>
        function atualizar_total() {
            let total = 0;

            $('span.total_unitario').each(function() {
                const valor = parseFloat($(this).text());
                total += valor;
            });

            $('#total').text(total);
        }

        function somar() {
            const linha = $(this).closest('tr');
            const preco_unitario = linha.find('span.preco_venda').text();
            const quantidade = $(this).val();
            const id = $(this).data('id');

            console.log("id é:", id);

            const total = parseFloat(preco_unitario) * parseInt(quantidade);

            const total_unitario = linha.find('span.total_unitario');
            total_unitario.text(total);

            /* Atualizar o valor total da compra */
            atualizar_total();

            /* Enviar requição para atualiza_carrinho.php para modificar sessão  */
            console.log("atualizando...");

            const dados_enviados = new URLSearchParams();
            dados_enviados.append('id', id);
            dados_enviados.append('quantidade', quantidade);

            console.log("dados:", dados_enviados);

            fetch('atualiza_carrinho.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: dados_enviados.toString()
                })
                .then(response => response.text())
                .catch(error => console.log('Houve erro:', error));
        }
        $("input[type='number']").change(somar);
    </script>
</body>

</html>
