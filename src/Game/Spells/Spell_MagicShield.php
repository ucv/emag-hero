<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:48
 */
namespace Game\Spells;

use Game\Npc;

class Spell_MagicShield extends Spell implements SpellInterface {

    public function __construct(Npc &$npc, array $params = [])
    {
        $this->setNpc($npc);
        $this->setName('Magic shield');
        $this->setDescription('Takes only half of the usual damage when an enemy attacks, there\'s a 20% change he\'ll use this skill every time he defends.
');
        $this->setLuck(20);
    }

    public function castSpell(Npc &$npc = null, array $params = [])
    {
        die( $this->getNpc()->getName() . " used " . $this->getName() . PHP_EOL );

        if(isset($params['damage'])){
            $damage = $this->getNpc()->getHealth() - $params['damage'] / 2;
            $this->getNpc()->setHealth(($damage));
            return $damage;
        }
    }

    public function getSpellChance()
    {
        parent::getLuck();
    }
}