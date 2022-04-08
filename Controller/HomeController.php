<?php
class HomeController extends AbstractController {
    public function index()
    {
        $this->render('home/index');
        MessageManager::getMessage();
        if ($this->getPost('subMessage')) {
            $message = htmlentities($_POST['message']);
            $name = $_SESSION['user']['username'];
            MessageManager::sendMessage($message, $name);
        }
    }

}
