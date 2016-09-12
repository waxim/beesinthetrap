<?php

namespace Game\Bee;

class Queen extends \Game\Bee
{
    /**
     * What health does this bee have?
     *
     * @var int
     */
    protected $health = 100;

    /**
     * Whats an attack on us worth?
     *
     * @var int
     */
    protected $damage = 8;

    /**
     * Release the wildfire?
     *
     * This will kill all bees.
     *
     * @var bool
     */
    protected $BURN_THEM_ALL = true;

    /**
     * A public name for this bee.
     *
     * @var string
     */
    protected $name = 'Queen';
}
