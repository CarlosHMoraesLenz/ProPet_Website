<?php
include_once('includes/sessionstart.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include_once("includes/HeadTagInfos.php");
    include_once("includes/bootstrap.php");
    ?>
    <title>Contatos</title>
</head>

<body>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <h2>Lista de Contatos</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th class="text-center">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                include_once("includes/conexao.php");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conn->prepare("SELECT * FROM contatus");
                $query->execute();
                if ($query->rowCount() > 0) {
                    $resultado = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach ($resultado as $indice => $servico) {
                        echo '<tr>
                                <td>' . $servico->id_cont . '</td>
								<td>' . $servico->nome . '</td>
								<td>' . $servico->email . '</td>
								<td>' . $servico->fone . '</td>
								<td class="text-center">
									<a href="excluirCont.php?id_cont=' . $servico->id_cont . '" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
								</td>
							</tr>';
                    }
                } else {
                    echo "Nenhuma cadastro encontrado!";
                }
                $conn = null;
            } catch (PDOException $e) {
                echo "Mensagem de erro:" . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
        <a href="index.php" class="btn btn-danger">Voltar<i class="fa fa-sign-out"></i></a>
    </div>
</body>

</html>