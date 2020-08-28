<?php
include_once('includes/sessionstart.php');

if (isset($_GET['id_cont'])) {
    try {
        include_once("includes/conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("DELETE FROM contatus WHERE id_cont = ?");
        $query->execute(array($_GET['id_cont']));
        if ($query->rowCount() > 0) {
            header("Location: adminCont.php?excluir=sucesso");
        } else {
            header("Location: adminCont.php?excluir=erro");
        }
        $conn = null;
    } catch (PDOException $e) {
        header("Location: adminCont.php?excluir=erro");
    }
} else {
    header("Location: adminCont.php");
}
