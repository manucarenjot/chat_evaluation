<?php
if (isset($_SESSION['alert']) && count($_SESSION['alert']) > 0) {
    $alerts = $_SESSION['alert'];
    unset($_SESSION['alert']);

    foreach ($alerts as $alert) {
        echo $alert;
    }
}
?>

<form method="post" action="?c=user&a=login" id="login">
    <table>
        <tr>
            <td><label for="mail">Adresse e-mail :</label></td>
            <td><input type="email" name="mail" id="mail" required></td>
        </tr>
        <tr>
            <td><label for="password">Password :</label></td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td><input type="submit" name="login"></td>
        </tr>
    </table>
</form>