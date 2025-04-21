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
            <legend>Listagem de clientes:</legend>
            <table>


                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Código da Cidade</th>
                    <th>Nome da Cidade</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($clientes as $cliente){
                        echo '<tr>';
                        echo '<td>' . $cliente['clicodigo'] . '</td>';
                        echo '<td>' . $cliente['clinome'] . '</td>';
                        echo '<td>' . $cliente['clicpf'] . '</td>';
                        echo '<td>' . $cliente['cidcodigo'] . '</td>';
                        echo '<td>' . $cliente['cidnome'] . '</td>';
                        echo '<td><a href="cliente/deletar?id=' . $cliente['clicodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Cliente:</legend>
            <form method="POST" action="cliente/cadastrar">

                <label for = "nome_cliente">Nome:</label>
                <input type = "text" name = "nome_cliente" required>

                <label for = "cpf">CPF:</label>
                <input type = "text" name = "cpf" required>

                <label for = "cidade">Cidade:</label>
                <select name = "cid_codigo">
                    <?php
                        foreach ($cidades as $cidade){
                            echo '<option value = "' . $cidade['cidcodigo'] . '">' . $cidade['cidnome'] . '</option>';
                        }
                    ?>
                </select>

                <input type="submit" name="cadastrar_cliente" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>