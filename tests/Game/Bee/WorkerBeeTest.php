<?php

namespace Game\Tests;

use \PHPUnit_Framework_TestCase as PHPUnit;

class WorkerBeeTest extends PHPUnit
{
    /**
     * A worker bee should have 100 hp.
    */
    public function testGetHp()
    {
        $hp = 75;
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getHp(), $hp);
    }

    /**
     * A worker bee should receive 8 damage.
    */
    public function testGetDamage()
    {
        $damage = 10;
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getDamage(), $damage);
    }

    /**
     * A worker bee have the name "Worker"
    */
    public function testGetName()
    {
        $name = "Worker";
        $bee = new \Game\Bee\Worker();
        $this->assertEquals($bee->getName(), $name);
    }

    /**
     * A worker bee should not kill all others.
    */
    public function testBurnThemAll()
    {
        $bee = new \Game\Bee\Worker();
        $this->assertFalse($bee->getBurnThemAll());
    }

    /**
     * Test we can lose life.
     */
    public function testLoseLife()
    {
        $bee = new \Game\Bee\Worker();
        $bee->hit();
        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }

    /**
     * Test we can lose life.
    */
    public function testDeath()
    {
        $bee = new \Game\Bee\Worker();

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
        $bee = new \Game\Bee\Worker();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }

    /**
     * Test we're can terminate
    */
    public function testTerminate()
    {
        $bee = new \Game\Bee\Worker();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
