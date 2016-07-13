<?php

namespace Game\Bee;

class Drone extends \Game\Bee
{

    /**
     * What health does this bee have?
     *
     * @var int
    */
    protected $health = 50;

    /**
     * Whats an attack on us worth?
     *
     * @var int
    */
    protected $damage = 12;

    /**
     * Release the wildfire?
     *
     * This will kill all bees.
     * @var bool
    */
    protected $BURN_THEM_ALL = false;

    /**
     * A public name for this bee.
     *
     * @var string
    */
    protected $name = "Drone";
}
