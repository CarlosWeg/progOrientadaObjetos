<!DOCTYPE HTML>
<html lang = "pt-br">

<head>

    <meta charset= "UTF-8">
    <title>Exercício PHP e Banco de dados</title>
    <link rel="stylesheet" href="style.css">    

</head>

<body>

    <div class = "container-principal">

        <?php include 'nav_template.php'; ?>

        <fieldset>
            <legend>Listagem de Funcionários:</legend>
            <table>


                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Código do Departamento</th>
                    <th>Descrição do Departamento</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($funcionarios as $funcionario){
                        echo '<tr>';
                        echo '<td>' . $funcionario['fcncodigo'] . '</td>';
                        echo '<td>' . $funcionario['fcnnome'] . '</td>';
                        echo '<td>' . $funcionario['dptcodigo'] . '</td>';
                        echo '<td>' . $funcionario['dptdescricao'] . '</td>';
                        echo '<td><a href="funcionario/deletar?id=' . $funcionario['fcncodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Funcionário:</legend>
            <form method="POST" action="funcionario/cadastrar">

                <label for = "nome_funcionario">Nome:</label>
                <input type = "text" name = "nome_funcionario" required>

                <label for = "departamento">Departamento:</label>
                <select name = "dpt_codigo">
                    <?php
                        foreach ($departamentos as $departamento){
                            echo '<option value = "' . $departamento['dptcodigo'] . '">' . $departamento['dptdescricao'] . '</option>';
                        }
                    ?>
                </select>

                <input type="submit" name="cadastrar_funcionario" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>