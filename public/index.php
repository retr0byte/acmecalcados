<?php require_once __DIR__.'/../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/home.css">
    <title>ACME Calçados | Home</title>

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
				<p>Em promoção</p>
			</div>
			<div class="box-img-mais-vendidos">
				
				<div class="img-mais-vendidos">

					

				</div>

			</div>
		</div>


		<!-- depoimentos-->

		<section class="s-depoimentos">

			<div class="titulo-depoimentos">
				<h2>O que nossos clientes tem a dizer?</h2>
			</div>

			<div class="container-depoimentos">

				<div class="folha-depoimento">
					<div class="imagem-depoimento">
						<img src="<?php echo PATH_LINKS ?>/assets/images/homem-jovem.jpg" alt="homem jovem">
					</div>
					<div class="nome-depoimento"><span>João</span></div>
					<div class="title-depoimentos"><p><span>"</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus. Integer luctus nisi ut quam euismod, id ultricies nunc convallis.</p></div>
				</div>

				<div class="folha-depoimento">
					<div class="imagem-depoimento">
						<img src="<?php echo PATH_LINKS ?>/assets/images/homem-jovem.jpg" alt="homem jovem">
					</div>
					<div class="nome-depoimento"><span>João</span></div>
					<div class="title-depoimentos"><p><span>"</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus. Integer luctus nisi ut quam euismod, id ultricies nunc convallis.</p></div>
				</div>

				<div class="folha-depoimento">
					<div class="imagem-depoimento">
						<img src="<?php echo PATH_LINKS ?>/assets/images/homem-jovem.jpg" alt="homem jovem">
					</div>
					<div class="nome-depoimento"><span>João</span></div>
					<div class="title-depoimentos"><p><span>"</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus. Integer luctus nisi ut quam euismod, id ultricies nunc convallis.</p></div>
				</div>



			</div>
		</section>

		<!-- parceiros -->

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

		<!-- newsletter -->
		<div class="newsletter">
			
			<section>
				<div class="title-newsletter"><span>Receba ofertas em primeira mão:</span></div>
				
				<div class="form-newsletter">
					<form method="POST" class="form-n">
						<input type="email" name="email_newsletter" placeholder="Seu melhor e-mail:">
						<input type="submit" value="Cadastrar">
					</form>
				</div>
			</section>

		</div>	

	</main>

	<?php  require_once PATH.'/../view/layout/global/footer.php'; ?>
</body>
</html>

