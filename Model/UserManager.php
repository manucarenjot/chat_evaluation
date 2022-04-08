<?php

use App\Connect\Connect;

class UserManager {


    public static function addUser(string $username, string $mail, string $password)
    {
        $insert = Connect::getPDO()->prepare("INSERT INTO rpm03_user (username, mail, password) 
                                            VALUES('$username', '$mail', '$password')");

        if ($insert->execute()) {
            $alert = [];
            $alert[] = '<div class="alert-succes">Inscription réussi !</div>';

            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=home');
            }
        }
        else {
            $alert = [];
            $alert[] = '<div class="alert-error">Les informations ne sont pas correcte !</div>';

            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=register');
            }
        }
    }

    public static function getMailExist(string $mail)
    {
        $get = Connect::getPDO()->prepare("SELECT * FROM rpm03_user WHERE mail = '$mail'");
        if ($get->execute()) {
            $datas = $get->fetchAll();
            foreach ($datas as $data) {
                if ($data['mail'] === $mail) {
                    $alert = [];
                    $alert[] = '<div class="alert-error">L\'adresse e-mail est déjà utilisé !</div>';
                    if (count($alert) > 0) {
                        $_SESSION['alert'] = $alert;
                        header('LOCATION: ?c=user&a=register');
                    }
                }
            }
        }

    }

    public static function getUsernameExist(string $username)
    {
        $get = Connect::getPDO()->prepare("SELECT * FROM rpm03_user WHERE username = '$username'");
        if ($get->execute()) {
            $datas = $get->fetchAll();
            foreach ($datas as $data) {
                if ($data['username'] === $username) {
                    $alert = [];
                    $alert[] = '<div class="alert-error">Le nom d\'utilisateur est déjà utilisé !</div>';
                    if (count($alert) > 0) {
                        $_SESSION['alert'] = $alert;
                        header('LOCATION: ?c=user&a=register');
                    }
                }
            }
        }
    }

    public static function connectUserWithMail(string $mail, string $password)
    {
        $alert = [];
        $result = Connect::getPDO()->prepare("SELECT * FROM rpm03_user WHERE mail = '$mail'");

        $result->execute();
        $data = $result->fetch();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $data;
                header('LOCATION: ?c=home');
            } else {
                $alert[] = '<div class="alert-error">Adresse e-mail ou mot de passe invalide !</div>';
                if (count($alert) > 0) {
                    $_SESSION['alert'] = $alert;
                    header('LOCATION: ?c=user&a=login');
                }

            }
        } else {
            $alert[] = '<div class="alert-error">Adresse e-mail ou mot de passe invalide !</div>';
            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
                header('LOCATION: ?c=user&a=login');
            }
        }
    }
}