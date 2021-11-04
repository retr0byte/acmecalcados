<?php require_once __DIR__.'/../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>ACME Calçados | Home</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/header.css">
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/footer.css">
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/home.css">
	
</head>
<body>
	<?php  require_once PATH.'/../view/layout/global/header.php';?>

	<main>
		<div class="banner-home">
			<div id="container">
				<div class="banner-conteudo">
					<span>Seja bem vindo(a) a ACME!</span>
					<p>Aqui você encontra os melhores calçados<br> pelo menor preço</p>
				</div>
			</div>
		</div>
		<div class="mais-vendidos">
			<div class="text-vendidos">
				<p>Mais vendidos</p>
			</div>
			<div class="box-img-mais-vendidos">
				
				<div class="img-mais-vendidos">

					<div id="container-img-vendidos">
						<div class="banner-conteudo-vendidos">
							<span>Bota de trilha - 123 Lorem Ipsum</span>
							
							<a href="#">Encontrar loja mais próxima</a>
						</div>
					</div>

				</div>

				<div class="img-mais-vendidos">

					<div id="container-img-vendidos">
						<div class="banner-conteudo-vendidos">
							<span>Tênis Nike 12345 - Lorem Ipsum</span>

							<a href="#">Encontrar loja mais próxima</a>
						</div>
					</div>

				</div>

			</div>
		</div>


		<!-- depoimentos-->

		<div class="container-depoimentos">

			<div class="folha-depoimento">
				<div class="imagem-depoimento">
					<img src="<?php echo PATH_LINKS ?>/assets/images/homem-jovem.jpg" alt="homem jovem">
				</div>
				<div class="nome-depoimento">nome</div>
				<div class="texto-depoimento">texto</div>
			</div>

			<div class="folha-depoimento">
				<div class="imagem-depoimento"><img src="<?php echo PATH_LINKS ?>/assets/images/homem-jovem.jpg" alt="homem jovem"></div>
				<div class="nome-depoimento">nome</div>
				<div class="texto-depoimento">texto</div>
			</div>

		</div>

		<section class="s-parceiros">
			<div class="title-parceiros">
				<h2>Parceiros</h2>
			</div>
			<div class="container-parceiros">
				<div class="circulo-parceiros"></div>
				<div class="circulo-parceiros"></div>
				<div class="circulo-parceiros"></div>
				<div class="circulo-parceiros"></div>
			</div>	
		</section>

	</main>

	<?php  require_once PATH.'/../view/layout/global/footer.php'; ?>
</body>
</html>

