<?php
require __DIR__ . '/../../../Engine/Config.php';
require __DIR__ . '/../../../Engine/Connect.php';
require __DIR__ . '/../../../Model/entity/Message.php';
require __DIR__ . '/../../../Model/MessageManager.php';




use App\Model\Entity\Article;
use App\Model\Manager\ArticleManager;
use App\Model\Entity\User;

session_start();

$payload = file_get_contents('php://input');
$payload = json_decode($payload);

// On quitte si tous les paramètres ne sont pas la...
if(empty($payload->title) || empty($payload->content)) {
    // 400 = Bad Request.
    http_response_code(400);
    exit;
}

// On quitte si l'utilisateur n'est pas connecté !
if(!isset($_SESSION['user'])) {
    // 403 = Non autorisé.
    http_response_code(403);
    exit;
}

// On nettoye les données.
$name = filter_var($payload->title, FILTER_SANITIZE_STRING);
$message = trim(strip_tags(htmlentities(($payload->content))));

$messages = new Message();
$messages->setMessage($message);
$messages->setUserFk($name);

// On tente l'enregistrement.
if (MessageManager::sendMessage($message, $name)) {
    // Si on le souhaite, on peut renvoyer l'article avec son ID (souvenez vous qu'on lui donne son id après enregistrement)
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