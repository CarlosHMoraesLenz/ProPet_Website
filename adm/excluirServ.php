<?php
include_once('includes/sessionstart.php');

$id_serv = "";
$nome = "";
$dono = "";
$erro = "";
if (isset($_GET['id_serv'])) {
	try {
		include_once("includes/conexao.php");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		# Prepara a consulta
		$query = $conn->prepare("SELECT * FROM servico WHERE id_serv = ?");
		# Executa no banco
		$query->execute(array($_GET['id_serv']));
		# Verifica se deu certo
		if ($query->rowCount() > 0) {
			# Capturar os dados do banco
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$id_serv = $resultado[0]->id_serv;
			$nome = $resultado[0]->nomepet;
			$dono = $resultado[0]->nomedono;
		} else {
			$erro = "Não foi possível retornar o cadastro";
		}
		# Fechar conexão
		$conn = null;
	} catch (PDOException $e) {
		$erro = "Mensagem de erro:" . $e->getMessage();
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir notícia</title>
	<?php
	include_once("includes/HeadTagInfos.php");
	include_once("includes/bootstrap.php");
	?>
</head>

<body>
	<div class="container">
		<div class="row pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Excluir o cadastro do Pet <?php echo $nome . ' do Dono ' . $dono ?> ?</h2>
				<p class="text-danger"><?php echo $erro ?></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<a class="btn btn-danger" href="bancoExcluiServ.php?id_serv=<?php echo $id_serv ?>">Confirmar</a>
				<a class="btn btn-secondary" href="adminServ.php">Cancelar</a>
			</div>
		</div>
	</div>
</body>

</html>