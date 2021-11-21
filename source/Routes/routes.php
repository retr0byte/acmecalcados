<?php

include_once __DIR__.'/../../assets/vendor/autoload.php';

use Source\Routes\Router;

die(defineRoute($_GET['action']));

function defineRoute($route): string {
    $result = '';

    switch ($route) {
        case 'sendmail':
            $router = new Router();
            $result = json_encode($router->sendmail($_POST['dataPkg']));
            break;
        case 'checkcaptcha':
            $router = new Router();
            $result = $router->checkcaptcha($_POST['token']);
            break;

        case 'validausuario':
            $router = new Router();
            $result = json_encode($router->validaUsuario($_POST['dataPkg']));
            break;

        case 'acaosair':
            $router = new Router();
            $result = json_encode($router->sair());
            break;

        case 'criapromocao':
            $router = new Router();

            $dataObj = [
              "nm_promocao" => base64_decode($_GET['n']),
              "vl_promocao" => base64_decode($_GET['v']),
              "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->criaPromocao($dataObj));
            
            break;

        case 'excluipromocao':
            $router = new Router();
            $result = json_encode($router->excluiPromocao($_POST['dataPkg']));
            
            break;

        case 'editapromocao':
            $router = new Router();

            $dataObj = [
                "nm_promocao" => base64_decode($_GET['n']),
                "vl_promocao" => base64_decode($_GET['v']),
                "u" => base64_decode($_GET['u']),
                "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->editaPromocao($dataObj));
            
            break;

        case 'criadepoimento':
            $router = new Router();

            $dataObj = [
              "nm_depoimento" => base64_decode($_GET['n']),
              "ds_depoimento" => base64_decode($_GET['v']),
              "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->criaDepoimento($dataObj));
            
            break;

        case 'excluidepoimento':
            $router = new Router();
            $result = json_encode($router->excluiDepoimento($_POST['dataPkg']));
            
            break;

        case 'editadepoimento':
            $router = new Router();

            $dataObj = [
                "nm_depoimento" => base64_decode($_GET['n']),
                "ds_depoimento" => base64_decode($_GET['v']),
                "u" => base64_decode($_GET['u']),
                "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->editaDepoimento($dataObj));
            
            break;

        case 'criaparceiro':
            $router = new Router();

            $dataObj = [
              "nm_parceiro" => base64_decode($_GET['n']),
              "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->criaParceiro($dataObj));
            
            break;

        case 'excluiparceiro':
            $router = new Router();
            $result = json_encode($router->excluiParceiro($_POST['dataPkg']));
            
            break;

        case 'editaparceiro':
            $router = new Router();

            $dataObj = [
                "nm_parceiro" => base64_decode($_GET['n']),
                "u" => base64_decode($_GET['u']),
                "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->editaParceiro($dataObj));
            
            break;

        case 'crialoja':
            $router = new Router();
            $result = json_encode($router->criaLoja($_POST['dataPkg']));
            
            break;

        case 'excluiloja':
            $router = new Router();
            $result = json_encode($router->excluiLoja($_POST['dataPkg']));
            
            break;

        case 'editaloja':
            $router = new Router();
            $result = json_encode($router->editaLoja($_POST['dataPkg']));
            
            break;

        case 'editausuario':
            $router = new Router();

            $dataObj = [
                "nm_usuario" => base64_decode($_GET['n']),
                "nm_acesso" => base64_decode($_GET['v']),
                "u" => base64_decode($_GET['u']),
                "photo" => $_FILES['photo']
            ];

            $result = json_encode($router->editaUsuario($dataObj));
            
            break;
        
        case 'crialead':
            $router = new Router();
            $result = json_encode($router->enviarLead($_POST['dataPkg']));
            
            break;

        case 'editasenha':
            $router = new Router();
            $result = json_encode($router->editaSenha($_POST['dataPkg']));
            
            break;

        default:
            // em caso de não vir rota nenhuma
            $result = json_encode([ "status" => 422 ]);
            break;
    }

    return $result;
}