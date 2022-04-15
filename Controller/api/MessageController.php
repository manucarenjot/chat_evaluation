<?php
namespace App\Controller\API;

use App\Controller\AbstractController;
use App\Model\Entity\Message;
use App\Model\MessageManager;

class MessageController extends AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }


    public function addMessage() {
        $payload = file_get_contents('php://input');
        $payload = json_decode($payload);


        if(empty($payload->content) || empty($payload->name)) {

            http_response_code(400);
            exit;
        }

        if (!isset($_SESSION['user'])) {
            http_response_code(403);
            exit;
        }

        $content = htmlentities($this->$payload->content);
        $name = htmlentities($this->$payload->name);

        $message = new message();
        $message->setMessage($content);
        $message->setUserFk($name);

        if (MessageManager::sendMessage($message)) {
            echo json_encode([
                'id'=> $message->getId(),
                'message'=> $message->getMessage(),
                'user_fk'=>$message->getUserFk(),
            ]);
            http_response_code(200);
            exit;
        }

        http_response_code(200);
        exit;
    }
}