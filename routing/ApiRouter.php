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
                // 404 = Not Found.
                http_response_code(404);
        }

        exit;
    }
}