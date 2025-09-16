<?php
include 'conexao.php';
$sql = $pdo->query("SELECT * FROM Aluno");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Página Principal</title>
</head>

<body>

    <div class="container">
        <h1>Página Principal</h1>

        <table class="table">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Email</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>/th>
            </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['email']; ?></td>
                        <td>
                            <?php
                            $partes = explode('-', $linha['data_nascimento']);
                            $data = $partes[2] . "/" . $partes[1] . "/" . $partes[0];
                            echo $data;
                            ?>
                        </td>
                        <td>
                            <form action="atualizar.php" method="post">
                                <button class="btn btn-primary" name="btnEditar" value="<?php echo $linha['id'];?>">Editar</button>
                        </td>
                        </form>

                        <td>
                            <form action="excluir.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este aluno?');">
                            <button class="btn btn-danger" name="btnExcluir" value="<?php echo $linha['id'];?>">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="adicionar.php" method="post">
            <input type="text" name="txtNome"
                placeholder="Digite o nome do aluno..." required>

            <input type="text" name="txtEmail"
                placeholder="Digite o email do aluno..." required>

            <input type="date" name="txtData"
                placeholder="Digite a data de nascimento do aluno...">

            <input type="submit" value="Salvar" name="btSalvar" class="btn btn-success">
        </form>
    </div>
</body>

</html>