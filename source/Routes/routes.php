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

        default:
            // em caso de não vir rota nenhuma
            $result = json_encode([ "status" => 422 ]);
            break;
    }

    return $result;
}