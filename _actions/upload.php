<?php

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

include("../vendor/autoload.php");

$user = Auth::check();

$type = $_FILES['photo']['type'];
$name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

if($type == "image/jpeg" or $type == "image/png") {
    $table = new UsersTables(new MySQL());
    $table->updatePhoto($user->id, $name);

    move_uploaded_file($tmp_name, "photos/$name");

    $user->photo = $name;

    HTTP::redirect("/profile.php");
}

HTTP::redirect("/profile.php", "error=upload");