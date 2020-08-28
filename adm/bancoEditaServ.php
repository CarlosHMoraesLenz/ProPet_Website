<?php
include_once('includes/sessionstart.php');

try {
    include_once("includes/conexao.php");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("UPDATE servico SET nomepet = ?,  especie = ?,
        porte = ?, nomedono = ?, fone = ?, email = ?, serv = ?  WHERE id_serv = ?");
    $query->execute(array(
        $_POST['nomePet'], $_POST['especie'], $_POST['porte'],
        $_POST['nomeDono'], $_POST['foneDono'], $_POST['emailDono'],
        $_POST['servicoPet'], $_POST['id_serv']
    ));
    if ($query->rowCount() > 0) {
        header("Location: adminServ.php?atualiza=sucesso");
    } else {
        header("Location: adminServ.php?atualiza=erro");
    }
    $conn = null;
} catch (PDOException $e) {
    header("Location: adminServ.php?atualiza=erro");
}
