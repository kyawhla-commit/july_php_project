<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");


$table = new UsersTables(new MySQL());
$table->insert([
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "password" => $_POST['password'],
]);

HTTP::redirect("/index.php", "register=success");