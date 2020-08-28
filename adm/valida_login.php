<?php
session_start();

$login = $_POST['email'];
$senha = hash("sha256", $_POST['senha']);

include_once('includes/conexao.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $conn->prepare("SELECT * FROM loginadm WHERE login = ? AND pass = ?");
$query->execute(array($login, $senha));
if ($query->rowCount() > 0) {
    $resultado = $query->fetchAll(PDO::FETCH_OBJ);
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $login;
    header("Location: index.php");
} else {
    header("Location: login.php?erro");
}
$conn = null;
