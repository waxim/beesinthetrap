<?php

namespace Game;

class Bee
{
    /**
     * What health does this bee have?
     *
     * @var int
    */
    protected $health;

    /**
     * Whats an attack on us worth?
     *
     * @var int
    */
    protected $damage;

    /**
     * Should a bee death kill everyone?
     *
     * @var bool
    */
    protected $BURN_THEM_ALL;

    /**
     * A public name for our bee.
     *
     * @var string
    */
    protected $name;

    /**
     * Hold our current health
     *
     * @var int
    */
    protected $current_health;

    /**
     * Give us life.
     *
     * Note: Children need to call parent::__construct()
    */
    public function __construct()
    {
        $this->current_health = $this->health;
    }

    /**
     * Get our HP from parent.
     *
     * @return int
    */
    public function getHp()
    {
        return isset($this->health) ? (int) $this->health : 0;
    }

    /**
     * Get our damage from parent.
     *
     * @return int
    */
    public function getDamage()
    {
        return isset($this->damage) ? (int) $this->damage : 0;
    }

    /**
     * Get our name
     *
     * @return string
    */
    public function getName()
    {
        return isset($this->name) ? $this->name : $this->name;
    }

    /**
     * Burn them all?
     *
     * @return bool
    */
    public function getBurnThemAll()
    {
        return isset($this->BURN_THEM_ALL) ? (bool) $this->BURN_THEM_ALL : false;
    }

    /**
     * Function to get the current life of
     * our bee
     *
     * @return int
    */
    public function getLife()
    {
        return $this->current_health;
    }

    /**
     * Takes one $damage from our $current_life
     *
     * @return void
    */
    public function hit()
    {
        if (($this->current_health - $this->damage) <= 0) {
            $this->current_health = 0;
        } else {
            $this->current_health = $this->current_health - $this->damage;
        }
    }

    /**
     * if $current_life is 0 we're dead.
     *
     * @return bool
    */
    public function isDead()
    {
        return (bool)$this->current_health <= 0;
    }

    /**
     * Make us no longer dead.
    */
    public function reset()
    {
        $this->current_health = $this->health;
    }

    /**
     * Teminate a bee
    */
    public function terminate()
    {
        $this->current_health = 0;
    }
}
