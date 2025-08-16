<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");

$email = $_POST['email'];
$password = $_POST['password'];

$table = new UsersTables(new MySQL());
$user = $table->find($email, $password);

if($user) {
    if($user->suspended) {
        HTTP::redirect("/index.php", "suspended=account");
    }
    
    session_start();
    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=login");
}