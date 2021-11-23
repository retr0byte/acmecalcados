<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

    <title>ACME Calçados | Carreiras</title>
    <link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/carreiras.css">
</head>
<body>
<?php  require_once PATH.'/../view/layout/global/header.php';?>

<main class="carreiras">
    <h1>Faça parte do nosso TIME!</h1>

    <section class="description">
        <div class="inner-wrapper">
            <span>#VEMSERACME</span>
            <h2>
                NOSSA FAMILIA É FORMADA <br>
                POR GENTE APAIXONADA
            </h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu ante interdum, sagittis neque ac, bibendum leo. Sed consequat vestibulum ipsum id suscipit. Sed pellentesque a ante non convallis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce laoreet neque in nibh pharetra, blandit hendrerit eros laoreet. Sed bibendum quam nibh, a dignissim sem consectetur sed. Fusce nec lectus in eros euismod fermentum. Proin feugiat nec mi ac ultricies. Quisque et lacus tempus, imperdiet lacus nec, porttitor neque. Pellentesque suscipit elit ac dolor accumsan, nec ornare enim mattis. Fusce eget ligula accumsan, viverra tortor at, porta dui. 
            </p>
            <br>
            <p>
                Nunc ut nisl tempus, placerat neque non, imperdiet massa. Nunc at mi ut neque suscipit imperdiet eu id mi. Praesent facilisis, ligula in vehicula maximus, quam metus blandit elit, vel auctor arcu urna non lorem. Sed at mollis metus. Donec pharetra sem quis velit pretium auctor. In hac habitasse platea dictumst. Pellentesque quis fermentum dolor. In dignissim ligula vel augue eleifend rhoncus. Pellentesque vel feugiat nisl, et interdum augue. Aliquam mauris arcu, bibendum sed nunc quis, ullamcorper ornare lacus. Aenean auctor, sem ultricies ultricies iaculis, ex metus maximus mi, vitae iaculis enim nisi tristique quam. Proin laoreet purus pulvinar velit luctus ultrices. Donec vulputate ex in leo ornare, rhoncus tristique dolor lobortis.
            </p>
        </div>

        <div class="inner-wrapper">
            <img src="<?php echo PATH_LINKS; ?>/assets/images/carreiras.jpg" alt="">
        </div>
    </section>

    <section class="cta">
        <h3>CURTIU? TÁ AFIM DE FAZER ACONTECER?</h3>
        <p>Legal! O próximo passo é você nos enviar seu currículo no e-mail: <strong>carreiras@acme.com</strong></p>
        <p>A gente te responde em até 5 dias úteis!</p>

        <span>
            <i class="fas fa-check-square"></i> #VEMSERACME
        </span>
    </section>
</main>

<?php  require_once PATH.'/../view/layout/global/footer.php'; ?>
</body>
</html>