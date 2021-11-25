<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php  
	use Source\Class\PostgreSqlCRUD;
	use Source\Class\Depoimentos;
	require_once PATH.'/../config/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php  require_once PATH.'/../view/layout/global/default_head.php';?>
	<title>ACME Calçados | Painel Depoimentos</title>

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
						<h1>Listagem:</h1>
					</div>
					
					<div class="novoItemListagem">
						<div class="btnListagem">
							<a href="<?php echo PATH_LINKS; ?>/view/pages/painelCriarDepoimentos.php">Adicionar novo<i class="fas fa-plus-circle"></i></a>
						</div>
					</div>

					<div class="itensListagem">
						<table>
							<tr>
								<th>Nome Depoimento</th>
								<th>Descrição depoimento</th>
								<th>Imagem</th>
								<th>Alterar</th>
								<th>Excluir</th>
							</tr>
							<?php
							$depoimento = new Depoimentos();
							$depoimento->listarDepoimento();  
							?>
						</table>
						
					</div>

				</div>
			</section>
		</div>
	</main>	
	
    <script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/painel_usuario.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/excluidepoimento.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/sair.js"></script>
</body>
</html>
