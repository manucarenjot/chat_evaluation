<?php

require __DIR__ . '/Routing/Router.php';

require __DIR__ . '/Engine/Config.php';
require __DIR__ . '/Engine/Connect.php';

require __DIR__ . '/Controller/AbstractController.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/MessageController.php';

require __DIR__ . '/Model/UserManager.php';
require __DIR__ . '/Model/MessageManager.php';

require __DIR__ . '/Controller/API/MessageController.php';