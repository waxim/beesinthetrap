<?php

namespace Game\Bee;

class Worker extends \Game\Bee
{

    /**
     * What health does this bee have?
     *
     * @var int
    */
    protected $health = 75;

    /**
     * Whats an attack on us worth?
     *
     * @var int
    */
    protected $damage = 10;

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
    public $name = "Worker";
}
