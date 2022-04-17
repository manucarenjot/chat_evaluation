<?php
namespace App\Routing;

use App\Controller\AbstractController;

class Router
{

    public static function route(string $controller, ?string $action = null) {
        $control = new $controller();
        $control->index();
        switch ($action) {
            case 'register':
                $control->register();
                break;
            case 'login':
                $control->login();
                break;
            case 'logout':
                $control->profil();
                break;
            case 'add-message':
                $control->addMessage();
                break;
        }
    }


    public static function secureUrl(?string $param): ?string
    {
        if(null === $param) {
            return null;
        }

        $param = strip_tags($param);
        $param =  trim($param);
        return strtolower($param);
    }
}