<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php  
	use Source\Class\MysqlCRUD;
	use Source\Class\usuarios;
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
						<h1>Adicionar registro:</h1>
					</div>

					<div class="itensListagem">
						<div class="formuNewPromo">
							<form method="POST" action="#" id="form_edit_usuario" enctype="multipart/form-data">
								<?php  
								echo $_SESSION['codigo'];
								// $usuario = new Usuarios();
								// $usuario->formEditUsuario($_SESSION["senha"]);
								?>
								<div class="box-form-geral">
									<div>
										<button type="submit">Atualizar registro</button>
								
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
    <script src="<?php echo PATH_LINKS ?>/assets/js/usuario.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/sair.js"></script>
</body>
</html>