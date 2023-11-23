<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Criar um Registro - Tutorial de PHP CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <!-- Container -->
    <div class="container">

        <div class="page-header">

            <h1>Criar Produto</h1>

        </div>

        <?php

        if ($_POST) {

            ///Inclui conexão com o banco de dados
            include 'config/database.php';

            try {

                //Consulta de inserção
                $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";

                //Prepara execução
                $stmt = $con->prepare($query);

                //Valores enviados
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $description = htmlspecialchars(strip_tags($_POST['description']));
                $price = htmlspecialchars(strip_tags($_POST['price']));

                //Vincula os parametros
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);

                //Especifica quando o registro foi inserido
                $created = date('y-m-d h:i:s');
                $stmt->bindParam(':created', $created);

                //Executa a consulta
                if ($stmt->execute()) {

                    echo "<div class='alert alert-success'>Registro feito com sucesso</div>";

                } else {

                    echo "<div class='alert alert-danger'>Falha na hora de registrar</div>";

                }

            }

            //Mostrar erro
            catch (PDOException $exception) {

                die('Error: ' . $exception->getMessage());

            }

        }

        ?>

        <!-- Formularion HTMl onde as informações serão inseridas -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <table class='table table-hover table-responsive table-bordered'>

                <tr>

                    <td>Nome</td>
                    <td><input type='text' name='name' class='form-control'></td>

                </tr>

                <tr>

                    <td>Descrição</td>
                    <td><input type='text' name='description' class='form-control'></td>

                </tr>

                <tr>

                    <td>Preço</td>
                    <td><input type='number' name='price' class='form-control'></td>

                </tr>

                <tr>

                    <td></td>
                    <td>

                        <input type='submit' value='save' class='btn btn-primary'>
                        <a href='index.php' class='btn btn-danger'>Voltar para produtos</a>

                    </td>

                </tr>

            </table>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>

</body>

</html>
