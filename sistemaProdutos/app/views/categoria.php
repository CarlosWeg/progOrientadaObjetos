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
            <legend>Listagem de categorias:</legend>
            <table>

                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>

                <?php
                    foreach ($categorias as $categoria){
                        echo '<tr>';
                        echo '<td>' . $categoria['catcodigo'] . '</td>';
                        echo '<td>' . $categoria['catdescricao'] . '</td>';
                        echo '<td><a href="categoria/deletar?id=' . $categoria['catcodigo'] . '">Deletar</a></td>';
                        echo '</tr>';
                    }
                ?>
            

            </table>

        </fieldset>

        <fieldset>
            <legend>Cadastro de Categoria:</legend>
            <form method="POST" action="categoria/cadastrar">

                <label for = "nome_categoria">Nome:</label>
                <input type = "text" name = "nome_categoria" required>

                <input type="submit" name="cadastrar_categoria" value="Cadastrar">
            </form>
        </fieldset>

    </div>

</body>

</html>