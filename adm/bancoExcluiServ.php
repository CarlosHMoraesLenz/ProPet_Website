<?php
include_once('includes/sessionstart.php');

if (isset($_GET['id_serv'])) {
    try {
        include_once("includes/conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("DELETE FROM servico WHERE id_serv = ?");
        $query->execute(array($_GET['id_serv']));
        if ($query->rowCount() > 0) {
            header("Location: adminServ.php?excluir=sucesso");
        } else {
            header("Location: adminServ.php?excluir=erro");
        }
        $conn = null;
    } catch (PDOException $e) {
        header("Location: adminServ.php?excluir=erro");
    }
} else {
    header("Location: adminServ.php");
}
