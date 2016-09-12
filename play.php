<?php

require 'vendor/autoload.php';

// Make a hive
$hive = new Game\Hive();
$hive->add("\Game\Bee\Queen", 1);
$hive->add("\Game\Bee\Worker", 5);
$hive->add("\Game\Bee\Drone", 8);

$game = new Game\BeeGame($hive);

while (!$game->isGameOver()) {
    $game->progress();
    $log = $game->getLastMessages();
    foreach ($log as $message) {
        echo "\n".$message;
    }
}
