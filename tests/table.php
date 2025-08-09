<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTables;

$table = new UsersTables(new MySQL);
$id = $table->insert([
    "name" => "Alice", 
    "email" => "alice@gmail.com",
    "phone" => "5456456540", 
    "address" => "Some Address",
    "password" => "password",
]);

echo $id;