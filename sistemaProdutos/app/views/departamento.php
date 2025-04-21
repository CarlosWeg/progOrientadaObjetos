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
            <legend>Listagem de departamentos:</legend>
            <table>


                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($departamentos as $departamento){
                        echo '<tr>';
                        echo '<td>' . $departamento['dptcodigo'] . '</td>';
                        echo '<td>' . $departamento['dptdescricao'] . '</td>';
                        echo '<td><a href="departamento/deletar?id=' . $departamento['dptcodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Departamento:</legend>
            <form method="POST" action="departamento/cadastrar">

                <label for = "nome_departamento">Nome:</label>
                <input type = "text" name = "nome_departamento" required>

                <input type="submit" name="cadastrar_departamento" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>