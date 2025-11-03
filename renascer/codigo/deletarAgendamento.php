<?php
require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // tenta deletar
    if (deletarAgendamento($conexao, $id)) {
        echo "<script>
                alert('Agendamento excluído com sucesso!');
                window.location.href = '../paginas/listarAgendamento.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao excluir o agendamento.');
                window.location.href = '../paginas/listarAgendamento.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID do agendamento não informado.');
            window.location.href = '../paginas/listarAgendamento.php';
          </script>";
}