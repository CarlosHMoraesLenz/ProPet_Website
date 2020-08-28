<?php

$email = $_POST['email'];
$nome = $_POST['nome'];
$fone = $_POST['fone'];
try {
    include_once("includes/conexao.php");
    $query = $conn->prepare("INSERT INTO contatus (email, nome, fone) VALUES (?, ?, ?)");
    $query->execute(array($email, $nome, $fone));
    if ($query->rowCount() > 0) {
        header("Location: index.php?cadastro=sucesso");
    } else {
        header("Location: index.php?cadastro=erro");
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Mensagem de erro:" . $e->getMessage();
}
