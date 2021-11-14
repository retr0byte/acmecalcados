<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php  require_once PATH.'/../view/layout/global/default_head.php';?>
	<title>ACME Calçados | Painel login</title>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/login.css">
</head>
<body>
	<?php  require_once PATH.'/../view/layout/global/header.php';?>
	<div class="centro-login">
		<div class="sessao-login">
			<h1>Acessar painel de controle</h1>
		</div>
		<div class="sessao-login">
			<div class="painel-login">
				<form action="#" method="POST" id="form_login">
					<p>
						<label for="usuario">Usuário:</label>
						<br>
						<input type="text" name="nm_usuario" id="nm_usuario" required>
					</p>
					<p>
						<label for="senha">Senha:</label>
						<br>
						<input type="password" name="nm_senha" id="nm_senha" required>
					</p>
					<p>
						<button type="submit">ACESSAR<ion-icon name="log-in" md="ios-log-in"></ion-icon></button>
					</p>
					<p style="display: none" id="login_status">
						
					</p>
				</form>
			</div>
		</div>
	</div>
	<?php  require_once PATH.'/../view/layout/global/footer.php';?>
	<script src="<?php echo PATH_LINKS ?>/assets/js/login.js"></script>
</body>
</html>

<!-- versao final -->