<?php
class Router
{

    public static function route(string $controller, ?string $action = null) {
        $control = new $controller();
        $control->index();
        switch ($action) {
            case 'logout':
                $control->logout();
                break;
            case 'register':
                $control->register();
            case 'login':
                $control->login();
                break;
            case 'profil':
                $control->profil();
                break;
            case 'messages':
                $control->messages();
                break;
            case 'devis':
                $control->devis();
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