<?php

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");

$id = $_GET['id'];
$role = $_GET['role'];

$table = new UsersTables(new MySQL());
$table->updateRole($id, $role);

HTTP::redirect("/admin.php", "changeRole=success");