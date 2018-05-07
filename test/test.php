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
    ->learnSpell(Spell::MAGIC_SHIELD)
    ->getId();

$npc = new Npc();
$battleground[] = $npc->setName("Wild beast")
    ->setHealth(rand(60,90))
    ->setStrength(rand(60,90))
    ->setDefence(rand(40,60))
    ->setSpeed(rand(40,60))
    ->setLuck(rand(25,40))
    ->getId();

$winner = '';
$fastestEntity = null;
$fastestEntityId = 0;
$fastestEntitySpeed = 0;
$fastestEntityLuck = 0;
foreach ($battleground as $entityId){
    /** @var Npc $entity */
    $entity = Game\Entity::getEntityById($entityId);

    $entitySpeed = $entity->getSpeed();
    $entityLuck = $entity->getLuck();
    if($entitySpeed >= $fastestEntitySpeed){
        if($entitySpeed == $fastestEntitySpeed && $entityLuck < $fastestEntityLuck){
            break;
        }
        $fastestEntity = $entity;
        $fastestEntityId = $entityId;
        $fastestEntitySpeed = $entitySpeed;
        $fastestEntityLuck = $entityLuck;
    }
}

echo $fastestEntity->getName(). ' charges at the enemy!'.PHP_EOL;

$numberOfTurns = 10;
for ($i = $fastestEntityId; $i < $numberOfTurns + $fastestEntityId; $i++){
    /** @var Npc $attackingNpc */
    $attackingNpc = \Game\Entity::getEntityById($battleground[$i%2]);
    /** @var Npc $defendingNpc */
    $defendingNpc = \Game\Entity::getEntityById($battleground[($i+1)%2]);

    $damageGiven = $attackingNpc->attack($defendingNpc->getId());

    echo $attackingNpc->getName() . " attacked " .$defendingNpc->getName() . PHP_EOL;
    echo $defendingNpc->getName() . " took " . $damageGiven . " damage";

    if (!$defendingNpc->isAlive()){
        echo ' '.$defendingNpc->getName() . " died!".PHP_EOL;
        $winner = $attackingNpc->getName();
        break;
    }
    echo " he has remaining " . $defendingNpc->getHealth().PHP_EOL;
}
if($winner != ''){
    echo $attackingNpc->getName() . ' won this fight!'.PHP_EOL;
}else{
    foreach ($battleground as $entityId){
        $entity = \Game\Entity::getEntityById($entityId);
        if(get_class($entity) == Npc::class){
            echo 'The ' . $entity->getName() . ' started running from our hero!'.PHP_EOL;
        }
    }
}