<?php
if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}
?>

<form action="?c=user&a=register" method="post" id="register">
    <label for="username">Nom d'utilisateur :</label>
    <br>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="mail">Adresse e-mail :</label>
    <br>
    <input type="email" name="mail" id="mail" required>
    <br>
    <label for="password">Password :</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="password-repeat">Password-repeat :</label>
    <br>
    <input type="password" name="password-repeat" id="password-repeat" required>
    <br>
    <input type="submit" name="register" id="password" required>
</form>
