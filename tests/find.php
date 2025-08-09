<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTables;

$table = new UsersTables(new MySQL);

print_r($table->find("alice@gmail.com", "password"));