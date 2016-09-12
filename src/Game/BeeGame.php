<?php

namespace Game;

class BeeGame extends Play
{
    protected $hive;

    public function __construct(\Game\Hive $hive)
    {
        parent::__construct();
        $this->hive = $hive;
    }

    public function progress()
    {
        parent::progress();

        $bee = $this->hive->random();

        if ($bee->isDead()) {
            return false;
        }

        $bee->hit();

        $turn = [];

        $turn[] = $bee->getName().' bee was attacked with '.$bee->getDamage().' and now '.($bee->getLife() > 0 ? 'has '.$bee->getLife().' health left' : 'is dead');

        if ($bee->isDead() && $bee->getBurnThemAll()) {
            $this->hive->burnThemAll();
            $turn[] = $bee->getName().' bee is dead, so the hive has been drestoryed.';

            $this->gameOver();
        }

        if ($this->isGameOver()) {
            $turn[] = 'All bees are dead, game over.';
        }

        $this->log($turn);
    }

    public function restart()
    {
        parent::restart();
        $this->hive->reset();
    }
}
