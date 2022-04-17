<?php
use App\Routing\Router;
use App\Routing\ApiRouter;
session_start();
require __DIR__ . '/../require.php';
if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<div class="menu">
            <a href="?c=chat&a=add-message">chat</a>
            <?php
            if (!isset($_SESSION['user'])) {
            ?>
            <a href="?c=user&a=register">Inscription</a>
            <a href="?c=user&a=login">login</a>
            <?php
            }
            if (isset($_SESSION['user'])) {
            ?>
            <a href="?c=user&a=logout">logout</a>
            <?php
            }
            ?>
</div>
<?php

if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}


$page = isset($_GET['c']) ? Router::secureUrl($_GET['c']) : 'home';
$action = isset($_GET['a']) ? Router::secureUrl($_GET['a']) : 'index';


switch ($page) {
    case 'home':
        Router::route('HomeController', $action);
        break;
    case 'user':
        Router::route('UserController', $action);
        break;
    case 'chat':
        Router::route('MessageController', $action);
        break;
    case 'api':
        ApiRouter::route($action);
        break;

}
?>

<footer>

</footer>
<script src="asset/js/message.js"></script>
</body>
</html>