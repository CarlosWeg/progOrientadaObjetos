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
            <legend>Listagem de cidades:</legend>
            <table>


                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($cidades as $cidade){
                        echo '<tr>';
                        echo '<td>' . $cidade['cidcodigo'] . '</td>';
                        echo '<td>' . $cidade['cidnome'] . '</td>';
                        echo '<td><a href="cidade/deletar?id=' . $cidade['cidcodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Cidade:</legend>
            <form method="POST" action="cidade/cadastrar">

                <label for = "nome_cidade">Nome:</label>
                <input type = "text" name = "nome_cidade" required>

                <input type="submit" name="cadastrar_cidade" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>