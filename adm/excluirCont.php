<?php
include_once('includes/sessionstart.php');
$id_cont = "";
$nome = "";
$email = "";
$erro = "";
if (isset($_GET['id_cont'])) {
	try {
		include_once("includes/conexao.php");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("SELECT * FROM contatus WHERE id_cont = ?");
		$query->execute(array($_GET['id_cont']));
		if ($query->rowCount() > 0) {
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$id_cont = $resultado[0]->id_cont;
			$nome = $resultado[0]->nome;
			$email = $resultado[0]->email;
		} else {
			$erro = "Não foi possível retornar o Contato";
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
	<title>Excluir Contato</title>
	<?php
	include_once("includes/HeadTagInfos.php");
	include_once("includes/bootstrap.php");
	?>
</head>

<body>
	<div class="container">
		<div class="row pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Excluir o contato de "<?php echo $nome . ', ' . $email ?>" ?</h2>
				<p class="text-danger"><?php echo $erro ?></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<a class="btn btn-danger" href="bancoExcluiCont.php?id_cont=<?php echo $id_cont ?>">Confirmar</a>
				<a class="btn btn-secondary" href="adminCont.php">Cancelar</a>
			</div>
		</div>
	</div>
</body>

</html>