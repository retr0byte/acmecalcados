<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>

<!-- Page Cultura -->
<!-- Sessão Sobre -->
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

	<title>ACME | Cultura</title>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/cultura.css">
	
</head>
<body>
    <!-- Chama o header -->
	<?php  require_once PATH.'/../view/layout/global/header.php';?>

    <section id="cultura"> 
        <!-- Título -->
        <h1>Cultura</h1>

        <!-- Imagem da vitrine -->
        <img src="<?php echo PATH_LINKS ?>/assets/images/cultura.jpg" alt="Vitrine de sapatos">

        <!-- Sobre nossa cultura -->
        <p>
        Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc. 
        </p>

        <br>

        <p>
        Proin egestas, elit id dapibus dapibus, dui quam placerat urna, molestie pretium erat sapien a felis. Integer blandit pellentesque urna, tincidunt dignissim neque viverra ac. Sed mi dui, tincidunt ac magna sit amet, lacinia hendrerit tortor. Ut rutrum eros non massa dictum lacinia. Nullam sollicitudin est vel turpis mollis, eget egestas nisl rhoncus. Maecenas accumsan tempus malesuada. Nunc iaculis sapien purus, vel lacinia orci facilisis sit amet. Sed et justo tortor. Donec ac nisi aliquet, cursus elit non, imperdiet nisi. Cras sed gravida est. Suspendisse massa odio, fringilla in lorem ac, finibus consectetur libero. Integer non eros quis tellus dictum vehicula. Morbi consequat dictum faucibus.
        </p>
    </section>

    <!-- Chama o footer -->
	<?php  require_once PATH.'/../view/layout/global/footer.php';?>
</body>
</html>

