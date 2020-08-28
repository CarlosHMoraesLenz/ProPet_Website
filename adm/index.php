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

    <title>Document</title>
</head>

<body>
    <main class="mainAdm">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
            <a href="adminServ.php">Lista para Serviços</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
            <a href="adminCont.php">Lista para Contatos</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
            <a href="adminAdm.php">Lista de Administradores</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
            <a href="logout.php" class="btn btn-danger">Logout<i class="fa fa-sign-out"></i></a>
        </div>
    </main>
</body>

</html>