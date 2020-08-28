<?php
include_once('includes/sessionstart.php');

$id_serv = "";
$nomepet = "";
$especie = "";
$porte = "";
$nomedono = "";
$fone = "";
$email = "";
$serv = "";
$erro = "";
if (isset($_GET['id_serv'])) {
	try {
		include_once("includes/conexao.php");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("SELECT * FROM servico WHERE id_serv = ?");
		$query->execute(array($_GET['id_serv']));
		if ($query->rowCount() > 0) {
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$id_serv = $resultado[0]->id_serv;
			$nomepet = $resultado[0]->nomepet;
			$especie = $resultado[0]->especie;
			$porte = $resultado[0]->porte;
			$nomedono = $resultado[0]->nomedono;
			$fone = $resultado[0]->fone;
			$email = $resultado[0]->email;
			$serv = $resultado[0]->serv;
		} else {
			$erro = "Não foi possível retornar o cadastro";
		}
		$conn = null;
	} catch (PDOException $e) {
		$erro = "Mensagem de erro:" . $e->getMessage();
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Editar notícia</title>
	<?php
	include_once("includes/HeadTagInfos.php");
	include_once("includes/bootstrap.php");
	?>
</head>

<body>
	<div class="container">
		<div class="row pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Editar serviço para o Pet</h2>
				<p class="text-danger"><?php echo $erro ?></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form method="POST" action="bancoEditaServ.php" class="was-validated">
					<input type="hidden" name="id_serv" value="<?php echo $id_serv ?>">
					<div class="form-group text-left">
						<label class="TextTitle" for="nomePet">Nome do Pet:</label>
						<input class="form-control" type="text" id="nomePet" name="nomePet" value="<?php echo $nomepet ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="especie">Espécie:</label>
						<input class="form-control" type="text" id="especie" name="especie" value="<?php echo $especie ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="porte">Porte:</label>
						<input class="form-control" type="text" id="porte" name="porte" value="<?php echo $porte ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="nomeDono">Nome do Dono:</label>
						<input class="form-control" type="text" id="nomeDono" name="nomeDono" value="<?php echo $nomedono ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="foneDono">Telefone:</label>
						<input class="form-control" type="text" id="foneDono" name="foneDono" placeholder="(99) 999999999" value="<?php echo $fone ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="emailDono">E-mail:</label>
						<input class="form-control" type="text" id="emailDono" name="emailDono" placeholder="nome@provedor.com" value="<?php echo $email ?>">
					</div>
					<div class="form-group text-left">
						<label class="TextTitle" for="servicoPet">Serviço a desejar:</label>
						<select class="form-control" id="servicoPet" name="servicoPet">
							<?php
							if ($serv == "TosaeBanho") {
								echo '<option value="">-- Escolha um serviço --</option>
							<option value="TosaeBanho" selected>Tosa e Banho</option>
							<option value="Castracao">Castração</option>
							<option value="Hospedagem">Hospedagem</option>
							<option value="TratamentoDentario">Tratamento Dentário</option>
							<option value="Vacinacao">Vacinação</option>';
							} else if ($serv == "Castracao") {
								echo '<option value="">-- Escolha um serviço --</option>
								<option value="TosaeBanho">Tosa e Banho</option>
								<option value="Castracao" selected>Castração</option>
								<option value="Hospedagem">Hospedagem</option>
								<option value="TratamentoDentario">Tratamento Dentário</option>
								<option value="Vacinacao">Vacinação</option>';
							} else if ($serv == "Hospedagem") {
								echo '<option value="">-- Escolha um serviço --</option>
								<option value="TosaeBanho">Tosa e Banho</option>
								<option value="Castracao">Castração</option>
								<option value="Hospedagem" selected>Hospedagem</option>
								<option value="TratamentoDentario">Tratamento Dentário</option>
								<option value="Vacinacao">Vacinação</option>';
							} else if ($serv == "TratamentoDentario") {
								echo '<option value="">-- Escolha um serviço --</option>
								<option value="TosaeBanho">Tosa e Banho</option>
								<option value="Castracao">Castração</option>
								<option value="Hospedagem">Hospedagem</option>
								<option value="TratamentoDentario" selected>Tratamento Dentário</option>
								<option value="Vacinacao">Vacinação</option>';
							} else if ($serv == "Vacinacao") {
								echo '<option value="">-- Escolha um serviço --</option>
								<option value="TosaeBanho">Tosa e Banho</option>
								<option value="Castracao">Castração</option>
								<option value="Hospedagem">Hospedagem</option>
								<option value="TratamentoDentario">Tratamento Dentário</option>
								<option value="Vacinacao" selected>Vacinação</option>';
							} else {
								echo '<option value="" selected>-- Escolha um serviço --</option>
								<option value="TosaeBanho">Tosa e Banho</option>
								<option value="Castracao">Castração</option>
								<option value="Hospedagem">Hospedagem</option>
								<option value="TratamentoDentario">Tratamento Dentário</option>
								<option value="Vacinacao">Vacinação</option>';
							}
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</form>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
				<a class="btn btn-danger" href="index.php">Voltar</a>
			</div>
		</div>
	</div>

</body>

</html>