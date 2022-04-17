<?php

namespace App\Controller;

use App\Model\Entity\Message;
use App\Model\MessageManager;

class HomeController extends AbstractController
{
    public function index()
    {
        $this->render('home/index');

    }
}
