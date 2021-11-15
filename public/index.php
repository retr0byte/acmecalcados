<?php require_once __DIR__.'/../assets/vendor/autoload.php'; ?>
<?php use Source\Class\MysqlCRUD; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/home.css">
    <title>ACME Calçados | Home</title>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
				
				<?php 
				$mysql = new MysqlCRUD();
				$comando = $mysql->selectFromDB(['*'], 'Promocoes', 'ORDER BY cd_Promocao DESC LIMIT 2');
				$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
				$linkLoja = PATH_LINKS . "/view/pages/lojas.php";
				if(count($resultado) != 0) {
					foreach ($resultado as $resultado) {
						$caminhoImg = PATH_LINKS . "/assets/images/" . $resultado['ds_PathImg'];
						echo "<div class='img-mais-vendidos' style='background: url($caminhoImg); width: 330px;height: 50vh;background-size: cover;background-position: 60% 85%;display: flex;margin: 10px 6vh;flex-direction: column-reverse;'>";

						echo "<div class='container-img-vendidos'>";
						echo "<div class='banner-conteudo-vendidos'>";
						echo "<span>" . $resultado['nm_Promocao'] . "</span>";
										
						echo "<a href='".$linkLoja."'>" . "Encontrar loja mais próxima" . "</a>";
						echo "</div>";
						echo "</div>";

						echo "</div>";
					}
				}
				?>

			</div>
		</div>


		<!-- depoimentos-->

		<section class="s-depoimentos">

			<div class="titulo-depoimentos">
				<h2>O que nossos clientes tem a dizer?</h2>
			</div>

			<div class="container-depoimentos owl-carousel">

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

			<script>
				$(".container-depoimentos").owlCarousel({
					loop: true,
					autoplay: true,
					autoplayTimeout: 2000,
					autoplayHoverPause: true,
				});
			</script>
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

		<div class="faq">
			<div class="title-faq"><h2>Perguntas frequentes</h2></div>
			<div class="faqItem altera">
				<div class="title-icon">
					<span class="span-faq">Quais as formas de pagamento?</span>
					<i class="fas fa-chevron-down altera"></i>
				</div>
				<p class="p-faq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus.</p>
			</div>

			<div class="faqItem">
				<div class="title-icon">
					<span class="span-faq">Como devolver um produto?</span>
					<i class="fas fa-chevron-down altera"></i>
				</div>
				<p class="p-faq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus.</p>
			</div>

			<div class="faqItem">
				<div class="title-icon">
					<span class="span-faq">Qual o prazo para devolução?</span>
					<i class="fas fa-chevron-down altera"></i>
				</div>
				<p class="p-faq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus.</p>
			</div>

			<div class="faqItem">
				<div class="title-icon">
					<span class="span-faq">Como trocar um produto?</span>
					<i class="fas fa-chevron-down altera"></i>
				</div>
				<p class="p-faq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus.</p>
			</div>

			<div class="faqItem">
				<div class="title-icon">
					<span class="span-faq">Qual o prazo para troca?</span>
					<i class="fas fa-chevron-down altera"></i>
				</div>
				<p class="p-faq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nibh tincidunt, pulvinar mauris non, ornare metus.</p>
			</div>

		</div>	

	</main>

	<?php  require_once PATH.'/../view/layout/global/footer.php'; ?>
	<script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/faq.js"></script>
</body>
</html>

