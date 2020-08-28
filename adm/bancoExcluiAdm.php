<?php

if (isset($_GET['login'])) {
    try {
        include_once('includes/conexao.php');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        # Prepara a consulta
        $query = $conn->prepare("DELETE FROM loginadm WHERE login = ?");
        # Executa no banco
        $query->execute(array($_GET['login']));
        # Verifica se deu certo
        if ($query->rowCount() > 0) {
            header("Location: adminAdm.php?excluir=sucesso");
        } else {
            header("Location: adminAdm.php?excluir=erro");
        }
        # Fechar conexão
        $conn = null;
    } catch (PDOException $e) {
        header("Location: adminAdm.php?excluir=erro");
    }
} else {
    header("Location: adminAdm.php?excluir=erro");
}
