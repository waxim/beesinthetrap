<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class BeeGameTest extends PHPUnit
{
    /**
     * Lets test a bee game.
     *
     * One queen.
     * Hit 13
     * She should die.
    */
    public function testProgress()
    {
        $hive = new \Game\Hive();
        $hive->add("\Game\Bee\Queen", 1);

        $game = new \Game\BeeGame($hive);

        /**
         * Don't look at my shame.
        */
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();
        $game->progress();

        $this->assertTrue($game->isGameOver());
    }
}
