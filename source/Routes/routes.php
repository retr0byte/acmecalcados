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
            $result = json_encode($router->criaPromocao($_POST['dataPkg']));
            
            break;

        case 'excluipromocao':
            $router = new Router();
            $result = json_encode($router->excluiPromocao($_POST['dataPkg']));
            
            break;

        case 'editapromocao':
            $router = new Router();
            $result = json_encode($router->editaPromocao($_POST['dataPkg']));
            
            break;

        case 'criadepoimento':
            $router = new Router();
            $result = json_encode($router->criaDepoimento($_POST['dataPkg']));
            
            break;

        case 'excluidepoimento':
            $router = new Router();
            $result = json_encode($router->excluiDepoimento($_POST['dataPkg']));
            
            break;

        case 'editadepoimento':
            $router = new Router();
            $result = json_encode($router->editaDepoimento($_POST['dataPkg']));
            
            break;

        case 'criaparceiro':
            $router = new Router();
            $result = json_encode($router->criaParceiro($_POST['dataPkg']));
            
            break;

        case 'excluiparceiro':
            $router = new Router();
            $result = json_encode($router->excluiParceiro($_POST['dataPkg']));
            
            break;

        case 'editaparceiro':
            $router = new Router();
            $result = json_encode($router->editaParceiro($_POST['dataPkg']));
            
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
            $result = json_encode($router->editaUsuario($_POST['dataPkg']));
            
            break;

        default:
            // em caso de não vir rota nenhuma
            $result = json_encode([ "status" => 422 ]);
            break;
    }

    return $result;
}