<?php

namespace Game\Tests;

use \PHPUnit_Framework_TestCase as PHPUnit;

class DroneBeeTest extends PHPUnit
{
    /**
     * A drone bee should have 100 hp.
    */
    public function testGetHp()
    {
        $hp = 50;
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getHp(), $hp);
    }

    /**
     * A drone bee should receive 8 damage.
    */
    public function testGetDamage()
    {
        $damage = 12;
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getDamage(), $damage);
    }

    /**
     * A drone bee have the name "Queen"
    */
    public function testGetName()
    {
        $name = "Drone";
        $bee = new \Game\Bee\Drone();
        $this->assertEquals($bee->getName(), $name);
    }

    /**
     * A drone bee should not kill all others.
    */
    public function testBurnThemAll()
    {
        $bee = new \Game\Bee\Drone();
        $this->assertFalse($bee->getBurnThemAll());
    }

    /**
     * Test we can lose life.
     */
    public function testLoseLife()
    {
        $bee = new \Game\Bee\Drone();
        $bee->hit();
        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }

    /**
     * Test we can lose life.
    */
    public function testDeath()
    {
        $bee = new \Game\Bee\Drone();

        while ($bee->isDead() !== true) {
            $bee->hit();
        }

        $this->assertTrue($bee->isDead());
    }

    /**
     * Test we're not dead yet.
    */
    public function testAlive()
    {
        $bee = new \Game\Bee\Drone();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }

    /**
     * Test we're can terminate
    */
    public function testTerminate()
    {
        $bee = new \Game\Bee\Drone();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
