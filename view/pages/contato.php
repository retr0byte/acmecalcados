<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACME | Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/header.css">
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/footer.css">
	<link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/contato.css">
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

    <script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery/jquery.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/libs/jQuery-mask/jquery.mask.min.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/form_acessivel_validacoes.js"></script>
    <script src="<?php echo PATH_LINKS ?>/assets/js/form_acessivel.js"></script>
</body>
</html>