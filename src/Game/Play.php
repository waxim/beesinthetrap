<?php

namespace Game;

class Play
{
    /**
     * Game over value.
    */
    const GAME_OVER = 'game_over';

    /**
     * Game active value
    */
    const IN_PLAY = 'active';

    /**
     * Awating first move value
    */
    const FIRST_MOVE = 'first_move';

    /**
     * Current status
    */
    protected $status;

    /**
     * Turn count
    */
    protected $turns = 0;

    /**
     * Game log.
    */
    protected $log = [];

    /**
     * Await first move.
    */
    public function __construct()
    {
        $this->status = self::FIRST_MOVE;
    }

    /**
     * Run a turn of our game
    */
    public function progress(){
        if ($this->status !== self::IN_PLAY) {
            $this->status = self::IN_PLAY;
        }

        if ($this->isGameOver()) {
            return false;
        }

        $this->turns++;
    }

    /**
     * game over
    */
    public function gameOver()
    {
        $this->status = self::GAME_OVER;
    }

    /**
     * Is game over?
    */
    public function isGameOver()
    {
        return $this->status == self::GAME_OVER;
    }

    /**
     * Restart our game.
    */
    public function restart()
    {
        $this->log[] = ["The game has been restarted."];
        $this->turns = 0;
        $this->status = self::FIRST_MOVE;
    }

    /**
     * How many turns have we had?
    */
    public function turnCount()
    {
        return (int) $this->turns;
    }

    /**
     * Add a message to our log.
     *
     * @param $message
    */
    public function log($message)
    {
        $this->log[] = $message;
    }

    /**
     * Returns the last message that made it into our log.
     *
     * @return array
    */
    public function getLastMessages()
    {
        return end($this->log);
    }

    /**
     * Get current game status
     *
     * @return string
    */
    public function getStatus()
    {
        return $this->status;
    }
}
