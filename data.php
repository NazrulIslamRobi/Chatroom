<?php

require_once('vendor/autoload.php');

$redis = new Predis\Client();

if (!empty($_POST['msg'])) {



    $sender = $_POST['sender'];
    $message = $_POST['msg'];

    $redis->rpush('chatroom-01', $sender.": " .$message);

    $messageList =  $redis->lrange('chatroom-01', 0, $redis->llen('chatroom-01'));

    foreach ($messageList as $m) {
        echo "<p class='bg-light p-2'>$m</p>";
    }
    
}

if(isset($_POST['refresh'])){
    $redis->del('chatroom-01');
    $messageList =  $redis->lrange('chatroom-01', 0, $redis->llen('chatroom-01'));

    foreach ($messageList as $m) {
        echo "<p class='bg-light p-2'>$m</p>";
    }
}
