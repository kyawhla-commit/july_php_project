<?php

use Faker\Factory as Faker;
use Libs\Database\MySQL;
use Libs\Database\UsersTables;

 include("vendor/autoload.php");

$faker = Faker::create();
$table = new UsersTables(new MySQL());

echo "Data seeding started ...<br>";

for($i=0; $i<20; $i++) {
$table->insert([
    "name" => $faker->name(),
    "email" => $faker->email(),
    "phone" => $faker->phoneNumber(),
    "address" => $faker->address(),
    "password" => "passowrd",
]);
}

echo "Data seeding complete";