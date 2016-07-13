# Bee Game

[![CircleCI](https://circleci.com/gh/waxim/beesinthetrap.svg?style=svg)](https://circleci.com/gh/waxim/beesinthetrap)

This is my simple implimenation of the PHP Coding Test "The Bee Game"

__Bees__

There are three types of bees in this game:

- Queen Bee
  - The Queen Bee has a lifespan of 100 Hit Points.
  - When the Queen Bee is hit, 8 Hit Points are deducted from her lifespan.
  - If/When the Queen Bee has run out of Hit Points, All remaining alive Bees automatically run out of hit points.
  - There is only 1Queen Bee.

- Worker Bee
  - Worker Bees have a lifespan of 75 Hit Points.
  - When a Worker Bee is hit, 10 Hit Pointsare deducted from his lifespan.
  - There are 5Worker Bees.

- Drone Bee
  - Drone Bees have a lifespan of 50 Hit Points.
  - When a Drone Bee is hit, 12 Hit Points are deducted from his lifespan.
  - There are 8 Drone Bees.

## Install the game
```
composer install
```

## Run the game.

```
php play.php
```

## Modify your hive
```php
$hive = new \Game\Hive();
$hive->add("\Game\Bee\Queen", 1);
$hive->add("\Game\Bee\Drone", 5);
$hive->add("\Game\Bee\Worker", 8);
```

## Modify your bees
`src/Game/Bee/Queen.php`

```php
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
     * @var bool
    */
    protected $BURN_THEM_ALL = true;
```

Adding new bees is a case of adding a class that extends `Bee`

```php
namespace Game\Bee;

class Weak extends \Game\Bee
{
    /**
     * What health does this bee have?
     *
     * @var int
    */
    protected $health = 5;

    /**
     * Whats an attack on us worth?
     *
     * @var int
    */
    protected $damage = 5;

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
    protected $name = "Weak";
}
```

## Tests
```
phpunit
```
