<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");
$id = $_GET['id'];

$table = new UsersTables(new MySQL());
$table->suspend($id);

HTTP::redirect("/admin.php");