<?php

namespace App\Routing;

use App\Controller\API\MessageController;

class ApiRouter
{

    public static function route(?string $action = null)
    {
        switch($action)
        {
            case 'chat':
                (new MessageController())->addMessage();
                break;
            default:
                http_response_code(404);
        }

        exit;
    }
}