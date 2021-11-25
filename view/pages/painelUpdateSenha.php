<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php  
	use Source\Class\PostgreSqlCRUD;
	use Source\Class\Usuarios;

	require_once PATH.'/../config/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php  require_once PATH.'/../view/layout/global/default_head.php';?>
	<title>ACME Calçados | Painel Minha conta</title>

	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/painel.css">
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/admPages.css">
</head>
<body>
	
	<main>
		<?php  require_once PATH.'/../view/layout/global/menu-lateral.php';?>
		<div id="divUniao">
			<?php  require_once PATH.'/../view/layout/global/menu-usuario.php';?>

			<section>
				<div class="centroListagem">
					<div class="tituloListagem">
						<h1>Alterar senha de acesso:</h1>
					</div>

					<div class="itensListagem">
						<section id="section-icon-senha">
							<i class="fas fa-eye-slash" id="bt_pass"></i>
						</section>
						<div class="formuNewPromo">
							<form method="POST" action="#" id="form_edit_senha" enctype="multipart/form-data">
								<?php  
								if(isset($_SESSION["codigo"])) {
									$usuario = new Usuarios();
									$code = $_SESSION["codigo"];
									$usuario->formEditSenha($code);
								}	
								
								?>
								<div class="box-form-geral">
									<div>
										<button type="submit" editcd="<?php echo $_SESSION["codigo"]; ?>" id="btn_cd">Atualizar senha</button>
									</div>
								</div>
								<div class="box-form-geral">
									<div>
										<p style="display: none" id="new_promocao_status"></p>
									</div>
								</div>
							</form>
							
						</div>
					</div>

				</div>
			</section>
		</div>
	</main>	
	
    <script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/painel_usuario.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/editasenha.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/password.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/sair.js"></script>
</body>
</html>