<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include_once("includes/HeadTagInfos.php");
    ?>
    <title>ProPet Veterinária - Serviços</title>
</head>

<body>
    <?php
    include_once("includes/HeaderTagDesk.php");
    include_once("includes/HeaderTagMob.php");
    ?>

    <main class="mainservicos">
        <div class="explicaServicos">
            <h1>Sobre os Serviços</h1>
            <span class="spanExplicaServicos">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet error eius
                similique earum, numquam doloremque officia cupiditate impedit vel facilis cumque fuga nam aliquam iste,
                rem libero vitae at accusamus.</span>
        </div>
        <div class="escolhaServicos">
            <h1>Serviços para o seu Pet</h1>
            <form id="formservice" action="cadServ.php" method="POST">
                <div class="form-group">
                    <label class="TextTitle" for="nomePet">Nome do Pet:</label>
                    <input class="campoText" type="text" id="nomePet" name="nomePet">
                </div>
                <div class="form-group">
                    <label class="TextTitle" for="especie">Espécie:</label>
                    <input class="campoText" type="text" id="especie" name="especie">
                </div>
                <div class="form-group">
                    <label class="TextTitle" for="porte">Porte:</label>
                    <input class="campoText" type="text" id="porte" name="porte">
                </div>
                <div class="espaco"></div>
                <div class="form-group">
                    <label class="TextTitle" for="nomeDono">Nome do Dono:</label>
                    <input class="campoText" type="text" id="nomeDono" name="nomeDono">
                </div>
                <div class="form-group">
                    <label class="TextTitle" for="foneDono">Telefone:</label>
                    <input class="campoText" type="text" id="foneDono" name="foneDono" placeholder="(99) 999999999">
                </div>
                <div class="form-group">
                    <label class="TextTitle" for="emailDono">E-mail:</label>
                    <input class="campoText" type="text" id="emailDono" name="emailDono" placeholder="nome@provedor.com">
                </div>
                <div class="espaco"></div>
                <div class="form-group">
                    <label class="TextTitle" for="servicoPet">Serviço a desejar:</label>
                    <select class="campoText" id="servicoPet" name="servicoPet">
                        <option value="">-- Escolha um serviço --</option>
                        <option value="TosaeBanho">Tosa e Banho</option>
                        <option value="Castracao">Castração</option>
                        <option value="Hospedagem">Hospedagem</option>
                        <option value="TratamentoDentario">Tratamento Dentário</option>
                        <option value="Vacinacao">Vacinação</option>
                    </select>
                </div>
                <button class="btn" type="submit">Enviar Pedido</button>
            </form>
        </div>
    </main>

    <?php
    include_once("includes/FooterTag.php");
    include_once("includes/ScriptLinkNav.php");
    ?>

    <script>
        let form = document.querySelector("#formservice");
        form.onsubmit = function(e) {
            e.preventDefault();
            let msgs = Array.from(document.querySelectorAll(".msg-verificacao"))
            msgs.map((e) => e.remove());
            let erro = false;

            if (form.nomePet.value == "") {
                form.nomePet.parentNode.append(criaMsg("#c00", "O campo 'Nome do Pet' não pode ficar vazio"));
                erro = true;
            }
            if (form.especie.value == "") {
                form.especie.parentNode.append(criaMsg("#c00", "O campo 'Espécie' não pode ficar vazio"));
                erro = true;
            }
            if (form.porte.value == "") {
                form.porte.parentNode.append(criaMsg("#c00", "O campo 'Porte' não pode ficar vazio"));
                erro = true;
            }
            if (form.nomeDono.value == "") {
                form.nomeDono.parentNode.append(criaMsg("#c00", "O campo 'Nome do Dono' não pode ficar vazio"));
                erro = true;
            }
            if (form.foneDono.value == "") {
                form.foneDono.parentNode.append(criaMsg("#c00", "O campo 'Telefone' não pode ficar vazio"));
                erro = true;
            } else if (form.foneDono.length > 14 && form.foneDono.length < 1) {
                form.foneDono.parentNode.append(criaMsg("#c00", "O campo 'Telefone' não esta completo"));
                erro = true;
            }
            if (form.emailDono.value == "") {
                form.emailDono.parentNode.append(criaMsg("#c00", "O campo 'E-mail' não pode ficar vazio"));
                erro = true;
            } else if (form.emailDono.value.indexOf("@") < 0) {
                form.emailDono.parentNode.append(criaMsg("#c00", "O email necessita de um @"))
                erro = true;
            } else if (form.emailDono.value.indexOf(".") < 3) {
                form.emailDono.parentNode.append(criaMsg("#c00", "O email necessita de provedor e .com"))
                erro = true;
            }
            if (form.servicoPet.value == "Escolha um serviço") {
                form.servicoPet.parentNode.append(criaMsg("#c00", "Selecione um serviço"));
                erro = true;
            }

            if (!erro) {
                // Prepara uma requisição AJAX
                var request = new XMLHttpRequest();
                // Configura o método POST e o action (vai enviar para a página actions.php)
                request.open("POST", "cadServ.php");
                // Envia o formulário com todos os parâmetros
                request.send(new FormData(form));
                // Captura a resposta
                request.onload = function(oEvent) {
                    // Se não deu erro (código 200 significa que a página actions.php foi alcançada) - 
                    //Não significa que os dados foram inseridos no banco de forma correta
                    if (request.status == 200) {
                        alert("Formulário enviado!");
                        // Senão deu erro
                    } else {
                        alert("Erro!");
                    }
                };
            }

        }

        function criaMsg(cor, msgPersonalizada) {
            let msg = document.createElement("small");
            msg.style.color = cor;
            msg.classList.add("msg-verificacao");
            msg.innerHTML = msgPersonalizada;
            return msg;
        }
    </script>
</body>

</html>