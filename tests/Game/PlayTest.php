<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class PlayTest extends PHPUnit
{

    /**
     * Test game starts, awaiting first move.
    */
    public function testGameStart()
    {
        $game = new \Game\Play();
        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);
    }

    /**
     * Test game moves along
    */
    public function testProgress()
    {
        $game = new \Game\Play();
        $game->progress();
        $this->assertEquals($game->turnCount(), 1);
        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);
    }

    /**
     * Test game log
    */
    public function testLog()
    {
        $game = new \Game\Play();
        $tolog = ["Testing our game log."];
        $game->log($tolog);

        $log = $game->getLastMessages();

        $this->assertSame($log, $tolog);
    }

    /**
     * Test game over
    */
    public function testGameOver()
    {
        $game = new \Game\Play();

        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);

        $game->progress();

        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);

        $game->gameOver();

        $this->assertEquals($game->getStatus(), \Game\Play::GAME_OVER);
    }

    /**
     * Test restart game
    */
    public function testRestartGame()
    {
        $game = new \Game\Play();
        $game->progress();
        $this->assertEquals($game->getStatus(), \Game\Play::IN_PLAY);
        $game->restart();
        $this->assertEquals($game->getStatus(), \Game\Play::FIRST_MOVE);
    }

}
