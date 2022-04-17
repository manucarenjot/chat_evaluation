<?php
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
    <link rel="stylesheet" href="">
</head>
<body><?php
if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}
?>
<header>
    <nav>
        <ul>
            <li><a href="?c=home&a=chat">Home</a></li>
            <li><a href="?c=user&a=register">Inscription</a></li>
            <li><a href="?c=user&a=login">login</a></li>
            <li><a href="?c=user&a=profil">profil</a></li>
        </ul>
    </nav>
</header>
<?php
if (isset($_SESSION['user'])) {
    echo 'Bonjour ' . $_SESSION['user']['username'];
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
    case 'api':
        // Prise en charge du cas ou on a recu un appel API
        ApiRouter::route($action);
        break;

}
?>

<footer>

</footer>
<script src=""></script>
</body>
</html>