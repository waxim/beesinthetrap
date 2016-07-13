<?php

namespace Game;

class Hive
{
    /**
     * Hold all our bees.
     * @var array \Game\Bee
    */
    protected $bees = [];

    /**
     * Hold a last good state.
     *
     * @var array
    */
    protected $last_good_state = [];

    /**
     * Add a bees to our hive.
     *
     * @param array $bees
     * @return void
    */
    public function add($class, $count)
    {
        $this->last_good_state[] = [$class, $count];

        for($i = 0; $i < $count; $i++){
            $this->bees[] = new $class;
        }
    }

    /**
     * Return a random bee from our hive.
     *
     * @return $this
    */
    public function random()
    {
        return $this->bees[array_rand($this->bees, 1)];
    }

    /**
     * Kills all the bees in our hive.
     *
     * @return void
    */
    public function burnThemAll()
    {
        foreach($this->bees as $key => $bee) {
            $bee->terminate();
        }
    }

    /**
     * Get the whole hive.
     *
     * @return $array \Game\Bee
    */
    public function getAll()
    {
        return $this->bees;
    }

    /**
     * Resets our hive to last know
     * good full state.
    */
    public function reset()
    {
        $this->bees = [];
        foreach($this->last_good_state as $bees){
            $this->add($bees[0], $bees[1]);
        }
    }
}
