<?php
use App\Model\entity\Message;
use App\Model\MessageManager;

require __DIR__ . '/../../../Engine/Config.php';
require __DIR__ . '/../../../Engine/Connect.php';
require __DIR__ . '/../../../Model/entity/Message.php';
require __DIR__ . '/../../../Model/MessageManager.php';



session_start();

$payload = file_get_contents('php://input');
$payload = json_decode($payload);


if(empty($payload->content)) {
    http_response_code(400);
    exit;
}


if(!isset($_SESSION['user'])) {
    http_response_code(403);
    exit;
}

$name = filter_var($_SESSION['user']['username'], FILTER_SANITIZE_STRING);
$message = trim(strip_tags(htmlentities(($payload->message))));

$messages = new Message();
$messages->setMessage($message);
$messages->setUserFk($name);


if (MessageManager::sendMessage($messages)) {
    echo json_encode([
        'id' => $messages->getId(),
        'message' => $messages->getMessage(),
        'user_fk' => $messages->getUserFk(),
    ]);
    http_response_code(200);
    exit;
}

http_response_code(200);
exit;