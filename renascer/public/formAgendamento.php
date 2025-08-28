<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Agendamento</title>
</head>
<body>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $agendar = salvarAgendamento($conexao)



    ?>

    <form action="">
        Data: <br>
        <input type="text" name="data" id=""> <br> <br>
        

        Horário: <br>
        <input type="text" name="Horário" id=""> <br> <br>


        <!-- aqui vai ter q ter uma estrutura de repetiçÃO -->
        Serviço: <br> 
        <select name="Tipo_Servico" id="">
            <option value="Serviço">Aqui vai ter os tipos de serviço</option> 

        </select> <br> <br>

        
        <!-- aqui vai ter q ter uma estrutura de repetiçÃO -->
        Cliente: <br> 
        <select name="Clientes" id="">
            <option value="Cliente">Égilly</option> 
        </select> <br> <br>

        Funcionário : <br> 
        <select name="funcionarios" id="">
            <option value="funcionario">funcionarios</option>
        </select>


    </form>
    
</body>
</html>