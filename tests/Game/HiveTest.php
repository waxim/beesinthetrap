<?php

namespace Game\Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class HiveTest extends PHPUnit
{
    /**
     * Test hive is empty, add one, test again.
     */
    public function testHiveAdd()
    {
        $hive = new \Game\Hive();
        $this->assertEmpty($hive->getAll());

        $hive->add("\Game\Bee\Queen", 1);

        $this->assertCount(1, $hive->getAll());
    }

    /**
     * Test hive is empty, add one, test again.
     */
    public function testRandom()
    {
        $hive = new \Game\Hive();

        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 3);

        $this->assertCount(4, $hive->getAll());

        $this->assertInstanceOf(\Game\Bee::class, $hive->random());
    }

    /**
     * Test burn them all.
     */
    public function testBurnThemAll()
    {
        $hive = new \Game\Hive();

        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 3);

        $this->assertCount(4, $hive->getAll());

        foreach ($hive->getAll() as $bee) {
            $this->assertFalse($bee->isDead());
        }

        $hive->burnThemAll();

        foreach ($hive->getAll() as $bee) {
            $this->assertTrue($bee->isDead());
        }
    }

    /**
     * Test burn them all.
     */
    public function testReset()
    {
        $hive = new \Game\Hive();

        $hive->add("\Game\Bee\Queen", 1);
        $hive->add("\Game\Bee\Worker", 3);

        $this->assertCount(4, $hive->getAll());

        foreach ($hive->getAll() as $bee) {
            $this->assertFalse($bee->isDead());
        }

        $hive->burnThemAll();

        foreach ($hive->getAll() as $bee) {
            $this->assertTrue($bee->isDead());
        }

        $hive->reset();

        foreach ($hive->getAll() as $bee) {
            $this->assertFalse($bee->isDead());
        }
    }
}
