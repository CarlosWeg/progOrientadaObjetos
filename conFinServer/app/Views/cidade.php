<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidade</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>

    
        <h1>Cidades</h1>

        <table>
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($aCidades as $aCidade): ?>
                    <tr>
                        <td><?= $aCidade['cidnome'] ?></td>
                        <td><?= $aCidade['estsigla'] ?></td>
                        <td><a href="/progOrientadaObjetos/conFinServer/cidade-excluir?cidcodigo=<?= $aCidade['cidcodigo'] ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <hr>

        <h2>Cadastrar Cidade</h2>

        <form action="/progOrientadaObjetos/conFinServer/cidade-cadastrar" method="post">

            <label for="nome_cidade">Cidade</label>
            <input type="text" name="nome_cidade" id="nome_cidade" required>

            <label for="sigla_estado">Estado</label>
            <input type="text" name="sigla_estado" id="sigla_estado" required>

            <button type="submit">Enviar</button>
        </form>

    </main>
    
</body>
</html>