<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>
    
    <title>ACME | Visão, Missão e Valores</title>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/valores.css">
</head>
<body>

    <?php  require_once PATH.'/../view/layout/global/header.php';?>
    
    <main class="valores">

        <h1>Visão, Missão e Valores</h1>

        <section class="item-wrapper">
            <div class="text-content">
                <h2>Visão</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>

            <div class="img-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/visao.jpg" alt="visão em primeira pessoa de um homem em frente ao mar">
            </div>
        </section>

        <section class="item-wrapper">
            <div class="img-wrapper middle-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/missao.jpg" alt="um homem em um estoque de sapatos">
            </div>
        
            <div class="text-content">
                <h2>Missão</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>
        </section>

        <section class="item-wrapper">
            <div class="text-content">
                <h2>Valores</h2>
                <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
            </div>

            <div class="img-wrapper">
                <img src="<?php echo PATH_LINKS ?>/assets/images/valores.jpg" alt="Um casal segurando um par de sapatos muito pequeno">
            </div>
        </section>
    </main>


    <?php  require_once PATH.'/../view/layout/global/footer.php';?>
</body>
</html>