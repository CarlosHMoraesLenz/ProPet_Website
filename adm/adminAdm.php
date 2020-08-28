<?php
include_once('includes/sessionstart.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastro de usuários</title>
	<?php
	include_once('includes/HeadTagInfos.php');
	include_once('includes/bootstrap.php');
	?>
</head>

<body>
	<div class="container">
		<div class="row pt-4">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<p class="text-success">Bem vindo</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<h2>Lista de usuários</h2>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 text-right">
				<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#myModal'>Cadastro de usuários</button>
				<!-- The Modal -->
				<div class="modal fade" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Cadastro de usuários</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<form action="bancoCadastraAdm.php" method="POST" class="was-validated">
									<div class="form-group text-left">
										<label for="nome">Login:</label>
										<input type="text" class="form-control" id="nome" placeholder="Nome do usuário" name="nome" required>
									</div>
									<div class="form-group text-left">
										<label for="senha">Senha:</label>
										<input type="password" class="form-control" id="senha" placeholder="***********" name="senha" required>
									</div>
									<button type="submit" class="btn btn-primary">Cadastrar</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<?php
			if (isset($_GET['cadastro'])) {
				if ($_GET['cadastro'] == "sucesso") {
					echo '<p class="text-success">Cadastro realizado com sucesso</p>';
				} else if ($_GET['cadastro'] == "erro") {
					echo '<p class="text-danger">Erro ao realizar cadastro</p>';
				}
			}
			if (isset($_GET['excluir'])) {
				if ($_GET['excluir'] == "sucesso") {
					echo '<p class="text-success">Usuário excluído com sucesso</p>';
				} else if ($_GET['excluir'] == "erro") {
					echo '<p class="text-danger">Erro ao excluir o usuário</p>';
				}
			}
			if (isset($_GET['atualiza'])) {
				if ($_GET['atualiza'] == "sucesso") {
					echo '<p class="text-success">Usuário atualizado com sucesso</p>';
				} else if ($_GET['atualiza'] == "erro") {
					echo '<p class="text-danger">Erro ao atualizar o usuário</p>';
				}
			}
			?>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Login</th>
					<th>Senha</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				try {
					include_once('includes/conexao.php');
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $conn->prepare("SELECT * FROM loginadm");
					$query->execute();
					if ($query->rowCount() > 0) {
						$resultado = $query->fetchAll(PDO::FETCH_OBJ);
						foreach ($resultado as $indice => $users) {
							echo '<tr>
								<td>' . $users->login . '</td>
								<td>' . $users->pass . '</td>
								<td class="text-center">
									<a href="excluirAdm.php?login=' . $users->login . '" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
								</td>
							</tr>';
						}
					} else {
						echo "Nenhuma noticia encontrado!";
					}
					# Fechar conexão
					$conn = null;
				} catch (PDOException $e) {
					echo "Mensagem de erro:" . $e->getMessage();
				}
				?>
			</tbody>
		</table>
		<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
			<a href="index.php" class="btn btn-danger">Voltar<i class="fa fa-sign-out"></i></a>
		</div>
	</div>
</body>

</html>