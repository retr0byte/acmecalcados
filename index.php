<?php require_once __DIR__ . '/assets/vendor/autoload.php'; ?>
<?php use Source\Class\PostgreSqlCRUD; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH . '/../view/layout/global/default_head.php';?>

	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/home.css">
    <title>ACME Calçados | Home</title>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="<?php echo PATH_LINKS ?>/assets/js/crialead.js"></script>

</head>

<body>
	<?php  require_once PATH . '/../view/layout/global/header.php';?>

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
				$pgsql = new PostgreSqlCRUD();
				$comando = $pgsql->selectFromDB(['*'], 'Promocoes', 'ORDER BY cd_promocao DESC LIMIT 2');
				$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
				$linkLoja = PATH_LINKS . "/view/pages/lojas.php";
				if(count($resultado) != 0) {
					foreach ($resultado as $resultado) {
						$caminhoImg = PATH_LINKS . "/assets/" . $resultado['ds_pathimg'];
						echo "<div class='img-mais-vendidos' style='background: url($caminhoImg); width: 330px;height: 50vh;background-size: cover;background-position: 60% 85%;display: flex;margin: 10px 6vh;flex-direction: column-reverse;'>";

						echo "<div class='container-img-vendidos'>";
						echo "<div class='banner-conteudo-vendidos'>";
						echo "<span id='span_nome'>" . $resultado['nm_promocao'] . "</span>";
						echo "<span id='span_preco'>" . "R$ " . $resultado['vl_promocao'] . "</span>";
										
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

				<?php
					$pgsql = new PostgreSqlCRUD();
					$comando = $pgsql->selectFromDb(['*'], 'depoimentos');
					$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
					if(count($resultado) != 0){
						foreach ($resultado as $resultado){
							echo "<div class='folha-depoimento'>";
							echo "<div class='imagem-depoimento'>";
							$caminhoImg = PATH_LINKS . "/assets/" . $resultado['ds_pathimg'];
							echo "<img src='".$caminhoImg."' alt='imagem'>";
							echo "</div>";
							echo "<div class='nome-depoimento'>" . "<span>" . $resultado["nm_depoimento"] . "</span>" . "</div>";
							echo "<div class='title-depoimentos'>"."<p>".'<span>"</span>'.$resultado["ds_depoimento"]."</p>"."</div>";
							echo "</div>";
						}
					}
				?>

				

			</div>

			<script>
				$(".container-depoimentos").owlCarousel({
					loop: true,
					autoplay: true,
					autoplayTimeout: 2000,
					autoplayHoverPause: true,
					responsiveClass:true,
    				responsive:{
								0:{
									items:1
								},
								600:{
									items:2,
									nav:false
								},
								1000:{
									items:3,
									loop:true
								}
    						}
				});
			</script>
		</section>

		<!-- parceiros -->

		<section class="s-parceiros">
			
			<div class="title-parceiros">
				<h2>Parceiros</h2>
			</div>

			<div class="container-parceiros owl-carousel">

				<?php
					$pgsql = new PostgreSqlCRUD();
					$comando = $pgsql->selectFromDb(['*'], 'parceiros');
					$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
					if(count($resultado) != 0){
						foreach ($resultado as $resultado){
							echo "<div class='item-parceiros'>";
							$caminhoImg = PATH_LINKS . "/assets/" . $resultado['ds_pathimg'];

							echo "<div class='circulo-parceiros'><img src='".$caminhoImg."'></div>";

							echo "<div>"."<span>".$resultado["nm_parceiro"]."</span>"."</div>";
							echo "</div>";
						}
					}
				?>



			</div>	
			
			<script>
				$(".container-parceiros").owlCarousel({
					loop: true,
					autoplay: true,
					autoplayTimeout: 2000,
					autoplayHoverPause: true,
					responsive:{
								0:{
									items:1,
									
								},
								600:{
									items:2,
									nav:false
								},
								1000:{
									items:3,
									loop:true
								}
    						}
				});
			</script>
		</section>

		<!-- newsletter -->
		<div class="newsletter">
			
			<section>
				<div class="title-newsletter"><span>Receba ofertas em primeira mão:</span></div>
				
				<div class="form-newsletter">
					<form method="POST" class="form-n" id="form_newsletter" action="#">
						<input type="email" name="nm_email" id="nm_email" placeholder="Seu melhor e-mail:">
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

	<?php  require_once PATH . '/../view/layout/global/footer.php'; ?>
	<script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/faq.js"></script>
</body>
</html>

