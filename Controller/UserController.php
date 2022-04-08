<?php
class UserController extends AbstractController {

    public function index()
    {

    }

    public function register() {
        $this->render('user/register');
    }
    public function login() {
        $this->render('user/login');
    }
}
