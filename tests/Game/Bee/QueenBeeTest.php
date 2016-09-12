<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class QueenBeeTest extends PHPUnit
{
    /**
     * A queen bee should have 100 hp.
     */
    public function testGetHp()
    {
        $hp = 100;
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getHp(), $hp);
    }

    /**
     * A queen bee should receive 8 damage.
     */
    public function testGetDamage()
    {
        $damage = 8;
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getDamage(), $damage);
    }

    /**
     * A queen bee have the name "Queen".
     */
    public function testGetName()
    {
        $name = 'Queen';
        $bee = new \Game\Bee\Queen();
        $this->assertEquals($bee->getName(), $name);
    }

    /**
     * A queen bee should kill all others.
     */
    public function testBurnThemAll()
    {
        $bee = new \Game\Bee\Queen();
        $this->assertTrue($bee->getBurnThemAll());
    }

    /**
     * Test we can lose life.
     */
    public function testLoseLife()
    {
        $bee = new \Game\Bee\Queen();
        $bee->hit();
        $this->assertEquals($bee->getLife(), ($bee->getHp() - $bee->getDamage()));
    }

    /**
     * Test we can lose life.
     */
    public function testDeath()
    {
        $bee = new \Game\Bee\Queen();

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
        $bee = new \Game\Bee\Queen();
        $bee->hit();

        $this->assertFalse($bee->isDead());
    }

    /**
     * Test we're can terminate.
     */
    public function testTerminate()
    {
        $bee = new \Game\Bee\Queen();
        $bee->terminate();

        $this->assertTrue($bee->isDead());
    }
}
