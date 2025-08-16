<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");

$id = $_GET['id'];

$table = new UsersTables(new MySQL());
$table->delete($id);

HTTP::redirect("/admin.php", "delete=success");