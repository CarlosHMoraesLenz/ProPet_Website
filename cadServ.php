<?php

if (
    isset($_POST['nomePet']) && isset($_POST['especie'])
    && isset($_POST['porte']) && isset($_POST['nomeDono'])
    && isset($_POST['foneDono']) && isset($_POST['emailDono'])
) {

    if (
        !empty($_POST['nomePet']) && !empty($_POST['especie'])
        && !empty($_POST['porte']) && !empty($_POST['nomeDono'])
        && !empty($_POST['foneDono']) && !empty($_POST['emailDono'])
    ) {


        try {
            # Conexão com o banco via PDO
            include_once("includes/conexao.php");
            # Habilita as exceptions
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Prepara a consulta
            $query = $conn->prepare("INSERT INTO servico (nomepet, especie, porte, nomedono, fone, email, serv)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            # Executa no banco
            $query->execute(array(
                $_POST['nomePet'], $_POST['especie'], $_POST['porte'], $_POST['nomeDono'],
                $_POST['foneDono'], $_POST['emailDono'],  $_POST['servicoPet']
            ));
            if ($query->rowCount() > 0) {
                header("Location: index.php");
            } else {
                header("Location: servicos.php?cadastro=erro");
            }
            $conn = null;
        } catch (PDOException $e) {
            echo "Mensagem de erro:" . $e->getMessage();
        }
    }
}
