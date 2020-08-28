<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include_once("includes/HeadTagInfos.php");
    ?>
    <title>ProPet Veterinária - Home</title>
</head>

<body>
    <?php
    include_once("includes/HeaderTagDesk.php");
    include_once("includes/HeaderTagMob.php");
    ?>

    <main class="main">
        <div class="servicosMain">
            <div class="titleServicosMain">
                <h1> Aproveite nossos serviços:</h1>
            </div>
            <div class="tiposServicosMain">
                <p>Pronto Atendimento*</p>
                <p>Maternidade*</p>
                <p>Tosa e Banho</p>
                <p>Castração</p>
                <p>Hospedagem</p>
                <p>Tratamento Dentário</p>
                <p>Vacinação</p>
            </div>
            <div class="infoServicosMain">
                <p class="infoHashtag">* para estes serviços ligue-nos </p>
            </div>
            <a href="servicos.php">Ir para Servços >></a>
        </div>
        <div class="aboutUsMain">
            <div class="imgAboutUsMain">
                <img src="imgs/fachada.jpg" alt="">
            </div>
            <div class="textAboutUsMain">
                <h1>Sobre Nós</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore fugit consequatur laudantium atque
                    perferendis ab omnis eum praesentium, nemo reprehenderit temporibus repellat, itaque voluptatum
                    suscipit animi! Inventore facere deserunt aperiam?</p>
            </div>
        </div>
    </main>

    <?php
    include_once("includes/FooterTag.php");
    include_once("includes/ScriptLinkNav.php");
    ?>
</body>


</html>