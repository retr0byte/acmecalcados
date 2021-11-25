<?php require_once __DIR__.'/../../assets/vendor/autoload.php'; ?>
<?php use Source\Class\PostgreSqlCRUD; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  require_once PATH.'/../view/layout/global/default_head.php';?>

    <title>ACME Calçados | Lojas</title>
    <link rel="stylesheet" href="<?php echo PATH_LINKS ?>/assets/css/lojas.css">
</head>
<body>
<?php  require_once PATH.'/../view/layout/global/header.php';?>

    <main class="lojas">
        <h1>Nossas lojas</h1>

        <section class="img-wrapper"></section>

        <section class="enderecos-lojas">

            <?php

            $pgsql = new PostgreSqlCRUD();
            $acessarLojasCadastradas = $pgsql->selectFromDB(['*'],'lojas');
            $lojasCadastradas = $acessarLojasCadastradas->fetchAll(PDO::FETCH_ASSOC);
            $qtdLojas = count($lojasCadastradas);

            if($qtdLojas === 0){
                ?>
                    <div class="warning">
                        <p>Nenhuma loja encontrada...</p>
                    </div>
                <?php
            }

            $lineMax = 3;
            for ($l=0; $l < $qtdLojas; $l++){
                $loja = $lojasCadastradas[$l];
                $nomeLoja = $loja['nm_loja'];
                $enderecoLoja = $loja['ds_endereco'];
                $telefoneLoja = $loja['cd_telefone'];
                $celularLoja = $loja['cd_celular'];

                $celularLojaFormatado = str_replace(['-','(', ')', ' '], '', $celularLoja);
                $linkWhats = "https://wa.me/55{$celularLojaFormatado}";

                if($lineMax === 3){
                    ?>
                        <div class="table-line">
                    <?php
                }
                $lineMax--;
                ?>

                    <div class="table-column">
                        <p><?php echo $nomeLoja; ?></p>
                        <p><?php echo $enderecoLoja; ?></p>
                        <p><i class="fas fa-phone-alt"></i> <?php echo $telefoneLoja; ?></p>
                        <p><i class="fab fa-whatsapp"></i> <?php echo $celularLoja; ?></p>

                        <div>
                            <a href="<?php echo $linkWhats; ?>" target="_blank"><i class="fas fa-calendar-alt"></i> Agendar</a>
                        </div>
                    </div>

                <?php

                if($lineMax === 0){
                    $lineMax = 3;
                ?>
                    </div>
                <?php
                }
            }

            ?>
        </section>
    </main>

<?php  require_once PATH.'/../view/layout/global/footer.php'; ?>
</body>
</html>