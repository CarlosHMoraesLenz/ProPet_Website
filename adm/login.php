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
	<div class="container h-100 pt-4">
		<div class="row h-100 justify-content-center align-items-center">
			<form class="form-signin col-sm-12 col-md-12 col-lg-6 text-center" method="POST" action="valida_login.php">
				<h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>
				<input type="tect" id="inputEmail" name="email" class="form-control mb-2" placeholder="Login" required autofocus>
				<input type="password" id="inputPassword" name="senha" class="form-control mb-2" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
				<?php
				if (isset($_GET['erro'])) {
					echo "<p style='color: #f00'>Login ou senha incorretos</p>";
				}
				?>
				<p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
			</form>
		</div>
	</div>
</body>

</html>