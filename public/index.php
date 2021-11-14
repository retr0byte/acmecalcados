<?php require_once __DIR__.'/../assets/vendor/autoload.php'; ?>
<?php use Source\Class\MysqlCRUD; ?>
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

