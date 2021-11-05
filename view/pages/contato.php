<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACME | Contato</title>
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
            <form action="#" method="POST">
                <div class="form-line-wrapper">
                    
                    <div class="form-column-wrapper">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>
                    
                    <div class="form-column-wrapper">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" name="sobrenome" id="sobrenome" required>
                    </div>

                </div>
            
                <div class="form-line-wrapper">
                    
                    <div class="form-column-wrapper">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" required>
                    </div>
                    
                    <div class="form-column-wrapper">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                </div>

                <div class="form-line-wrapper">
                    <div class="form-column-wrapper w100">
                        <label for="assunto">Assunto:</label>
                        <input type="text" name="assunto" id="assunto" required>
                    </div>
                </div>
                
                <div class="form-line-wrapper">
                    <div class="form-column-wrapper w100">
                        <label for="mensagem">Mensagem:</label>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="15" required></textarea>
                    </div>
                </div>
                
                <div class="form-line-wrapper">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </section>


    </main>

    <?php  require_once PATH.'/../view/layout/global/footer.php';?>
</body>
</html>