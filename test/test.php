<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 07:44
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use Game\Npc;
use Game\Player;
use Game\Spells\Spell;

$battleground = [];
$player = new Player();
$battleground[] = $player->setName('Orderus')
    ->setHealth(rand(70,100))
    ->setStrength(rand(70,80))
    ->setDefence(rand(45,55))
    ->setSpeed(rand(40,50))
    ->setLuck(rand(10,30))
    ->learnSpell(Spell::RAPID_STRIKE)
    ->learnSpell(Spell::MAGIC_SHIELD);

$npc = new Npc();
$battleground[] = $npc->setName("Wild beast")
    ->setHealth(rand(60,90))
    ->setStrength(rand(60,90))
    ->setDefence(rand(40,60))
    ->setSpeed(rand(40,60))
    ->setLuck(rand(25,40));

$running = true;
for ($i = 1;$i <= 20;$i++){
    /** @var Npc $attackingNpc */
    $attackingNpc = &$battleground[$i%2];
    /** @var Npc $defendingNpc */
    $defendingNpc = &$battleground[!$i%2];

    $damageGiven = $attackingNpc->attack($defendingNpc);

    echo $attackingNpc->getName() . " attacked " .$defendingNpc->getName() . PHP_EOL;
    echo $defendingNpc->getName() . " took " . $damageGiven . " damage;" . $defendingNpc->getHealth() .  PHP_EOL;

    if (!$defendingNpc->isAlive()){
        echo $defendingNpc->getName() . " died!";
        $running = false;
    }

}

