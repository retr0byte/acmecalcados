<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

    <title>ACME | Contato</title>
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/contato.css">

    <script src="<?php echo PATH_LINKS ?>/assets/js/captchaChecks.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=captchaIsLoaded" async defer></script>
</head>
<body>
    <?php  require_once PATH.'/../view/layout/global/header.php';?>
    
    <main class="contato">
        <h1>Contato</h1>

        <section class="description">
            <p>Nunc aliquam mauris non lorem ornare, et fringilla ligula suscipit. Ut molestie tristique ex a placerat. Fusce malesuada consectetur massa, vitae semper nibh laoreet at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent posuere elementum massa, vel ultricies dolor rhoncus non. Pellentesque sagittis efficitur lacus, vitae iaculis nisi rutrum placerat. Praesent pretium dui a auctor lobortis. Duis eget vehicula ligula, vitae semper purus. Quisque ac hendrerit felis, ac molestie ante. Maecenas ligula lorem, cursus ultrices magna eu, ultrices cursus ipsum. Ut pharetra mauris ac placerat pretium. Maecenas non lacinia nunc.</p>
        </section>

        <section class="form-contato">
            <h2>Vamos bater um papo!</h2>
            <div id="mensagensErro">
                <h2>Avisos - dados inválidos</h2>
                <div id="erros">

                </div>
            </div>

            <div id="mensagensSucesso">
                <i class="fas fa-check-double"></i>
                <p id="sucesso">Tudo certo</p>
            </div>

            <div id="loading">
                <img src="<?php echo PATH_LINKS ?>/assets/images/loading.svg" alt="loading">
            </div>
            <form id="formAcessivel" action="#" method="POST">
                <div id='recaptcha' class="g-recaptcha"
                     data-sitekey="<?php echo SITE_KEY; ?>"
                     data-callback="captchaOnSubmit"
                     data-size="invisible">
                </div>

                <div class="form-line-wrapper">
                    
                    <div class="form-column-wrapper">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    
                    <div class="form-column-wrapper">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" name="sobrenome" id="sobrenome">
                    </div>

                </div>
            
                <div class="form-line-wrapper">
                    
                    <div class="form-column-wrapper">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone">
                    </div>
                    
                    <div class="form-column-wrapper">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email">
                    </div>

                </div>

                <div class="form-line-wrapper">
                    <div class="form-column-wrapper w100">
                        <label for="assunto">Assunto:</label>
                        <input type="text" name="assunto" id="assunto">
                    </div>
                </div>
                
                <div class="form-line-wrapper">
                    <div class="form-column-wrapper w100">
                        <label for="mensagem">Mensagem:</label>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="15"></textarea>
                    </div>
                </div>
                
                <div class="form-line-wrapper">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </section>


    </main>

    <?php  require_once PATH.'/../view/layout/global/footer.php';?>

    <script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/form_acessivel_validacoes.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/form_acessivel.js"></script>
</body>
</html>