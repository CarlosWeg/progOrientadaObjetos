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
            <legend>Listagem de Fornecedores:</legend>
            <table>


                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Código da Cidade</th>
                    <th>Nome da Cidade</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($fornecedores as $fornecedor){
                        echo '<tr>';
                        echo '<td>' . $fornecedor['forcodigo'] . '</td>';
                        echo '<td>' . $fornecedor['fornome'] . '</td>';
                        echo '<td>' . $fornecedor['forcnpj'] . '</td>';
                        echo '<td>' . $fornecedor['cidcodigo'] . '</td>';
                        echo '<td>' . $fornecedor['cidnome'] . '</td>';
                        echo '<td><a href="fornecedor/deletar?id=' . $fornecedor['forcodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Fornecedor:</legend>
            <form method="POST" action="fornecedor/cadastrar">

                <label for = "nome_fornecedor">Nome:</label>
                <input type = "text" name = "nome_fornecedor" required>

                <label for = "cnpj">CNPJ:</label>
                <input type = "text" name = "cnpj" required>

                <label for="cidade">Cidade:</label>
                <select name = "cid_codigo">
                    <?php
                        foreach ($cidades as $cidade){
                            echo '<option value = "' . $cidade['cidcodigo'] . '">' . $cidade['cidnome'] . '</option>';
                        }
                    ?>
                </select>

                <input type="submit" name="cadastrar_fornecedor" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>