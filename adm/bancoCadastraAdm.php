<?php

if (
    isset($_POST['nome']) && isset($_POST['senha'])
) {

    if (
        !empty($_POST['nome']) && !empty($_POST['senha'])
    ) {

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];


        try {
            include_once('includes/conexao.php');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("INSERT INTO loginadm (login, pass) VALUES (?, SHA2(?,256))");
            $query->execute(array($nome,  $senha));
            if ($query->rowCount() > 0) {
                header("Location: adminAdm.php?cadastro=sucesso");
            } else {
                header("Location: adminAdm.php?cadastro=erro");
            }
            # Fechar conexão
            $conn = null;
        } catch (PDOException $e) {
            echo "Mensagem de erro:" . $e->getMessage();
        }
    }
}
