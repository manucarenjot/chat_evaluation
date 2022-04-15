<?php

namespace App\Controller;

class HomeController extends AbstractController {
    public function index()
    {
        $this->render('home/index');
        MessageManager::getMessage();
        if ($this->getPost('subMessage')) {
            $content = htmlentities($_POST['message']);
            $name = $_SESSION['user']['username'];

            $message = new Message();
            $message
                 ->setMessage($content)
                 ->setUserFk($name)
                ;

            MessageManager::sendMessage($message);
        }
    }

}
