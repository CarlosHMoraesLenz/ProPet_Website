<?php
include_once('includes/sessionstart.php');


$nome = "";
$erro = "";
if (isset($_GET['login'])) {
	try {
		include_once('includes/conexao.php');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("SELECT * FROM loginadm WHERE login = ?");
		$query->execute(array($_GET['login']));
		if ($query->rowCount() > 0) {
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$nome = $resultado[0]->login;
		} else {
			$erro = "Não foi possível retornar o usuário";
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
	<title>Excluir usuário</title>
	<?php
	include_once('includes/HeadTagInfos.php');
	include_once('includes/bootstrap.php');
	?>

<body>
	<div class="container">
		<div class="row pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Excluir o usuário <?php echo $nome ?></h2>
				<p class="text-danger"><?php echo $erro ?></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<a class="btn btn-danger" href="bancoExcluiAdm.php?login=<?php echo $nome ?>">Confirmar</a>
				<a class="btn btn-secondary" href="index.php">Cancelar</a>
			</div>
		</div>
	</div>
</body>

</html>