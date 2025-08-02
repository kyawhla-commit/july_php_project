<?php

include("../vendor/autoload.php");

use Faker\Factory as Faker;
use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

Auth::check();
HTTP::redirect();
(new MySQL)->connect();
(new UsersTables)->insert();

$fake = Faker::create();
echo $fake->name;

