<?php

use App\Model\Entity\Message;
use App\Model\MessageManager;

class MessageController extends \App\Controller\AbstractController
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function AddMessage()
    {
        MessageManager::getMessage();
        if ($this->getPost('subMessage')) {
            $content = htmlentities($_POST['message']);
            $name = $_SESSION['user']['username'];

            $message = new Message();
            $message
                ->setMessage($content)
                ->setUserFk($name);

            MessageManager::sendMessage($message);
        }
    }
}
