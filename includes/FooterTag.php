<footer class="footer">
    <div class="logoFooter">
        <img class="imgLogoFooter" src="imgs/roundlogo.png" alt="">
        <h1 class="h1LogoFooter">ProPet Veteriária</h1>
    </div>
    <div class="linhaVertivalFooter"></div>
    <div class="enderecoFooter">
        <h2>Endereço:</h2>
        <h3>Rua do Pet, nº 101 Bairro dos Bichanos - Porto Alegre - RS - 99999-99</h3>
        <h2>Telefone:</h2>
        <h3>(51) 99999-9999</h3>
        <h2>E-mail:</h2>
        <h3>propet@propet.com.br</h3>
    </div>
    <div class="linhaVertivalFooter"></div>
    <div class="contatoFooter">
        <h2>Deixe seus dados que entramos em contato:</h2>
        <form class="formContatoFooter" action="cadCont.php" method="POST">
            <p for="nome">Nome</p>
            <input type="text" name="nome" id="nome">
            <p for="email">Email</p>
            <input type="text" name="email" id="email">
            <p for="fone">Fone</p>
            <input type="text" name="fone" id="fone">
            <button class="btnformContatoFooter" type="submit">Enviar Contato</button>
            <?php
            if (isset($_GET['cadastro'])) {
                if ($_GET['cadastro'] == "sucesso") {
                    echo '<script>alert("Contato enviado");</script>';
                }
            }
            ?>
        </form>
    </div>
</footer>