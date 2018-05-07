<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:48
 */
namespace Game\Spells;

use Game\Entity;
use Game\Npc;

class SpellRapidStrike extends Spell implements SpellInterface {

    public function __construct(int $id)
    {
        $this->setName('Rapid Strike');
        $this->setDescription('Strike twice while it\'s his turn to attack, there\'s a 10% he\'ll use this skill every time he attacks');
        $this->setLuck(10);
    }

    public function castSpell(int $enemyId, array $params = [])
    {
        $damage = isset($params['damage'])?$params['damage']:0;
        if($damage > 0 && $this->getLuck() >= rand(0,100)){
            $damage = $damage * 2;
            $entity = Entity::getEntityById($enemyId);
            echo '[Spell] '. $entity->getName() . ' casted ' . $this->getName().PHP_EOL;
        }
        return $damage;
    }

    public function getSpellChance()
    {
        parent::getLuck();
    }
}