<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<!-- Sessão Sobre -->
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

    <title>ACME | Projetos Sociais</title>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/projetosSociais.css">
</head>
<body>
    <?php  require_once PATH.'/../view/layout/global/header.php';?>
    
    <main class="projetos-sociais">
        <h1>Projetos Sociais</h1>

        <section class="item-wrapper">
            <div class="text-content">
                <h2>Reciclagem</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>

            <div class="img-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/reciclagem.jpg" alt="reciclagem">
            </div>
        </section>

        <section class="item-wrapper">
            <div class="img-wrapper middle-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/desmatamento.jpg" alt="desmatamento">
            </div>
        
            <div class="text-content">
                <h2>ONGs contra o desmatamento</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>
        </section>

        <section class="item-wrapper">
            <div class="text-content">
                <h2>Apoio a instituições de acolhimento a crianças carentes</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>

            <div class="img-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/criancas.jpg" alt="crianças">
            </div>
        </section>
    </main>

    <?php  require_once PATH.'/../view/layout/global/footer.php';?>
</body>
</html>