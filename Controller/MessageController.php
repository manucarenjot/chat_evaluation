<?php


use App\Controller\AbstractController;
use App\Model\Entity\Message;
use App\Model\MessageManager;

class MessageController extends AbstractController
{

    public function index()
    {
        $this->render('home/chat');
    }

    public function AddMessage()
    {
        MessageManager::getMessage();
        $alert = [];
        if ($this->getPost('subMessage')) {
            $content = htmlentities($_POST['message']);
            $name = $_SESSION['user']['username'];
            if (empty($content)) {
                $alert[] = '<div class="alert-error">Le message est vide</div>';
            }
            if (strlen($content) <=1 || strlen($content) >= 255) {
                $alert[] = '<div class="alert-error">Le message doit contenir entre 2 et 255 caractères !</div>';
            }
            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=home');
            }
            else {

                $message = new Message();
                $message
                    ->setMessage($content)
                    ->setUserFk($name);

                MessageManager::sendMessage($message);
            }
        }
    }
}
