<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$usuarios = listarUsuario($conexao);

$idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : null;
$agendamentosPendentes = [];

if ($idusuario) {
    $sql = "SELECT a.idagendamento, a.data, a.horario, s.tipo_servico, s.preco_servico
            FROM tb_agendamento a
            INNER JOIN tb_servico s ON s.idservico = a.tb_servico_id_servico
            LEFT JOIN tb_pagamento p ON p.tb_agendamento_idagendamento = a.idagendamento
            WHERE a.tb_usuario_idusuario = $idusuario
            AND p.idpagamento IS NULL";
    $resultado = mysqli_query($conexao, $sql);
    $agendamentosPendentes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Realizar Pagamento</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="fundo-verde" id="tituloreaP">

    <form method="GET" action="realizarPagamento.php" class="card card-agendamento p-4 shadow mb-3">
        <h1 class="realizarP">Realizar Pagamento</h1>
        <div class="mb-3">
            <label for="idusuario" class="form-label">Selecione o Cliente</label>
            <select class="form-select" id="idusuario" name="idusuario" onchange="this.form.submit()">
                <option value="">Selecione</option>
                <?php
                foreach ($usuarios as $usuario) {
                    if ($usuario['tipo'] === 'c') {
                        $selected = ($idusuario == $usuario['idusuario']) ? 'selected' : '';
                        echo "<option value='{$usuario['idusuario']}' $selected>{$usuario['nome']}</option>";
                    }
                }
                ?>
            </select>
        </div>
    </form>

<?php
if ($idusuario) {
    echo '<form action="salvarPagamento.php" method="post" class="card card-agendamento p-4 shadow">';

    if (count($agendamentosPendentes) > 0) {
        echo '<div class="mb-3">
                <label for="idagendamento" class="form-label">Agendamento</label>
                <select class="form-select" id="idagendamento" name="idagendamento" required>
                    <option value="">Selecione</option>';
        foreach ($agendamentosPendentes as $a) {
            echo "<option value='{$a['idagendamento']}'>{$a['data']} - {$a['horario']} | {$a['tipo_servico']} (R$ {$a['preco_servico']})</option>";
        }
        echo '  </select>
              </div>

              <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" required>
                </div>

              <div class="mb-3">
                  <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                  <select class="form-select" id="forma_pagamento" name="forma_pagamento" required>
                      <option value="">Selecione</option>
                      <option value="dinheiro">Dinheiro</option>
                      <option value="cartao">Cartão</option>
                      <option value="pix">Pix</option>
                  </select>
              </div>
              <div class="mb-3">
                  <label for="descricao" class="form-label">Descrição</label>
                  <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Escreva algo sobre o pagamento..."></textarea>
              </div>
              <button type="submit" class="btn btn-dark w-100">Confirmar Pagamento</button>';
    } else {
        echo '<p class="text-center">Este cliente não tem agendamentos pendentes.</p>';
    }

    echo '</form>';
}
?>
</body>
</html>
