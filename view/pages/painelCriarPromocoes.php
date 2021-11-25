<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php  
	use Source\Class\PostgreSqlCRUD;
	use Source\Class\Promocoes;
	require_once PATH.'/../config/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php  require_once PATH.'/../view/layout/global/default_head.php';?>
	<title>ACME Calçados | Painel Criar Promoções</title>

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
							<form method="POST" action="#" id="form_new_promocao" enctype="multipart/form-data">
								<div class="box-form-geral">
									<div>
										<label for="nome">NOME:</label>
									
										<input type="text" name="nm_promocao" id="nm_promocao" required>
									</div>
									
									<div>
										<label for="preco">PREÇO:</label>
										
										<input type="text" name="vl_promocao" id="vl_promocao" required>
									</div>
								</div>
								<div class="box-form-geral">
									<div>
										<label for="ds_pathimg">IMAGEM:</label>
										<input type="file" name="ds_pathimg" id="ds_pathimg" required>
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
    <script src="<?php echo PATH_LINKS ?>/assets/js/promocao.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/sair.js"></script>
</body>
</html>