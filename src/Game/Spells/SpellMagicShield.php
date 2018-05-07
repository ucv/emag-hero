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

class SpellMagicShield extends Spell implements SpellInterface {

    public function __construct(int $id)
    {
        $this->setName('Magic shield');
        $this->setDescription('Takes only half of the usual damage when an enemy attacks, there\'s a 20% change he\'ll use this skill every time he defends.');
        $this->setLuck(20);

        return $this;
    }

    public function castSpell(int $entityId, array $params = [])
    {
        $damage = $params['damage'];
        if($damage > 0){
            $spellRoll = rand(0, 100);
            if($this->getLuck() >= $spellRoll){
                $damage = $damage / 2;
                $entity = Entity::getEntityById($entityId);
                echo '[Spell]['.$spellRoll.'] '. $this->getName(). ' was casted on ' . $entity->getName().PHP_EOL;
            }
        }
        return $damage;
    }

    public function getSpellChance()
    {
        parent::getLuck();
    }
}