<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$servicos = listarServico($conexao);
$usuarios = listarUsuario($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
</head>
<body>
    <h1>Agendar</h1>
    <form action="salvarAgendamento.php" method="post">
        Data: <input type="date" name="data"><br><br>
        Horário: <input type="text" name="horario"><br><br>

        Serviço: 
        <select name="idservico">
            <option value="">Selecione</option>
            <?php
            foreach ($servicos as $servico) {
                echo "<option value='".$servico['idservico']."'>".$servico['tipo_servico']." - R$ ".$servico['preco_servico']."</option>";
            }
            ?>
        </select>
        <br><br>

        Cliente: 
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

        <input type="submit" value="Salvar">
    </form>
</body>
</html>