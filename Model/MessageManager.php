<?php

use App\Connect\Connect;

class MessageManager {


    public static function getMessage() {
        $select = Connect::getPDO()-> prepare("SELECT * FROM rpm03_messages ORDER BY date desc LIMIT 10 ");

        if ($select->execute()) {
            $datas = $select->fetchAll();?>
            <div class="chat"></div>
            <?php


            foreach ($datas as $data) {

                $a = DecHex(mt_rand(0,15));
                $b = DecHex(mt_rand(0,15));
                $c = DecHex(mt_rand(0,15)); $d = DecHex(mt_rand(0,15));
                $e = DecHex(mt_rand(0,15)); $f = DecHex(mt_rand(0,15));
                $hexac = $a . $b . $c . $d . $e . $f;
                ?>
                <div class="message">
                    <span><?= date('H:i', strtotime('+2 hour', strtotime($data['date']))) ?></span>
                    <span><b style="color: <?=$hexac?>"><?=ucfirst($data['user_fk'])?></b> :</span>
                    <span><b><?= ucfirst($data['message'])?></b></span>
                </div>


<?php
            }
            ?>
            <form method="post" action="?c=home">
                <input type="text" name="message" id="send-message">
                <input type="submit" name="subMessage" id="add-message" value="➤">
            </form>
<?php
        }
    }

    public static function sendMessage(string $message,string $name) {
        $insert = Connect::getPDO()->prepare("INSERT INTO rpm03_messages (message, user_fk, date) VALUES (:message, :user_fk, NOW()) ");

        $insert->bindValue(':message', $message);
        $insert->bindValue(':user_fk', $name);

        if ($insert->execute()) {
            $alert[] = '<div class="alert-succes">Message envoyé !</div>';

            if (count($alert) > 0) {
                $_SESSION['alert'] = $alert;
            }
        }
    }
}