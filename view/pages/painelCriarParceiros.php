<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php  
	use Source\Class\MysqlCRUD;
	use Source\Class\Parceiros;
	require_once PATH.'/../config/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php  require_once PATH.'/../view/layout/global/default_head.php';?>
	<title>ACME Calçados | Painel Criar Parceiros</title>

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
						<h1>Adicionar Registro:</h1>
					</div>

					<div class="itensListagem">
						<div class="formuNewPromo">
							<form method="POST" action="#" id="form_new_parceiro" enctype="multipart/form-data">
								<div class="box-form-geral">
									<div>
										<label for="nome">NOME:</label>
										<input type="text" name="nm_parceiro" id="nm_parceiro" required>
									</div>
									
								</div>
								<div class="box-form-geral">
									<div>
										<label for="imagem">IMAGEM:</label>
										<input type="file" name="ds_PathImg" id="ds_PathImg" required>
									</div>
								</div>
								<div class="box-form-geral">
									<div>
										<button type="submit">Criar registro</button>
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
    <script src="<?php echo PATH_LINKS ?>/assets/js/parceiro.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/sair.js"></script> 
</body>
</html>